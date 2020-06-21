<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\Quiz;
use App\User;
use App\Results;
class Quiz extends Model
{
    protected $fillable = [
        'name', 'email', 'description','minutes'
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function users(){
        return $this->belongsToMany(User::class,'quiz_user');
    }
    public function storeQuiz($data){
        return Quiz::create($data);
    }
    public function allQuiz(){
        return Quiz::all();
    }
    public function getQuiz($id){
        return Quiz::find($id);
    }
    public function updateQuiz($data,$id){
        return Quiz::find($id)->update($data);
    }
    public function deleteQuiz($id){
        return Quiz::find($id)->delete();
    }
    public function assignExam($data){
        $quiz_id = $data['quiz_id'];
        $quiz = Quiz::find($quiz_id);
        $user_id =$data['user_id'];
        return $quiz->users()->syncWithoutDetaching($user_id);
    }
    public function hasQuizAttempted(){
        $attemptedQuiz = [];
        $authUser = auth()->user()->id;
        $user = Results::where('user_id',$authUser)->get();
        foreach($user as $u){
            array_push($attemptedQuiz,$u->quiz_id);
        }
        return $attemptedQuiz;
    }
}
