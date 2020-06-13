<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
class Answer extends Model
{
    protected $fillable = [
        'question_id', 'answer' , 'is_correct'
    ];
    public function question(){
        return $this->belongsTo(Question::class);
    }
     //Model Functions
     public function storeAnswer($data,$question){
        foreach($data['options'] as $key=>$option){
            $is_correct = false;
            if($key == $data['correct_answer']){
                $is_correct = true;
            }
            Answer::create([
                'question_id' => $question->id,
                'answer' => $option,
                'is_correct' => $is_correct
            ]);
        }
        //return Question::create($data);
    }
    public function deleteAnswer($question_id){
        $answer = Answer::where('question_id',$question_id)->delete();
    }
    public function updateAnswer($data,$question){
        $this->deleteAnswer($question->id);
        $this->storeAnswer($data,$question);
    }
}
