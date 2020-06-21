<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Results;
use App\Question;
use DB;
class ExamController extends Controller
{
    public function create()
    {
        return view('backend.exam.create');
    }
    public function store(Request $request){
       $exam = (new Quiz)->assignExam($request->all());
       return redirect()->back()->with('message','Exam assigned to user successfully!');
    }
    public function userExam(Request $request){
        $quizzes = Quiz::get();
       // echo '<pre>';print_r($quizzes);echo '</pre>';
        return view('backend.exam.index',compact('quizzes'));
    }
    public function removeExam(Request $request){
        $userID = $request->get('user_id');
        $quizID = $request->get('quiz_id');
        $quiz = Quiz::find($quizID);
        $result = Results::where('quiz_id',$quizID)->where('user_id',$userID)->exists();
        if($result){
            return redirect()->back()->with('message','Exam assigned to user, so can\'t be removed!');
        }else{
            $quiz->users()->detach($userID);
            return redirect()->back()->with('message','Exam has been removed!');
        }
     }
     public function getQuizQuestions(Request $request,$quizId){
         $authUser = auth()->user()->id;
         //check if user is assign to perticuler quiz
         $userId = DB::table('quiz_user')->where('user_id',$authUser)->pluck('quiz_id')->toArray();
         if(!in_array($quizId,$userId)){
            return redirect()->to('/home')->with('error','You are not assigned to this exam!');
         }
         $quiz = Quiz::find($quizId);
         $time = Quiz::where('id',$quizId)->value('minutes');
         $quizQuestions = Question::where('quiz_id',$quizId)->with('answers')->get();
         $authUserHasPlayedQuiz = Results::where(['user_id'=>$authUser,'quiz_id'=>$quizId])->get();
          //check if user completed perticuler quiz
          $wasCompleted = Results::where('user_id',$authUser)->whereIn('quiz_id',(new Quiz)->hasQuizAttempted())->pluck('quiz_id')->toArray();
          if(in_array($quizId,$wasCompleted)){
             return redirect()->to('/home')->with('error','You are already completed this exam!');
          }
         return view('frontend.quiz',compact('quiz','time','quizQuestions','authUserHasPlayedQuiz'));
     }
     public function postQuiz(Request $request){
        $questionId = $request['questionId'];
        $quizId = $request['quizId'];
        $answerId = $request['answerId'];
        $authUser = auth()->user();
        if($questionId!=0){
            
          return $userQusetionAnswer = Results::updateOrCreate(
                ['user_id'=>$authUser->id,'quiz_id'=>$quizId,'question_id'=>$questionId],['answer_id'=>$answerId]
            );
         }
     }
     public function viewResult($userID,$quizID){
        $results = Results::where('user_id',$userID)->where('quiz_id',$quizID)->get();
        return view('frontend.result_details',compact('results'));
     }
}
