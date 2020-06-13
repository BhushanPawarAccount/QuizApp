<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\Answer;
use App\User;
class Results extends Model
{
    protected $fillable = [
        'user_id', 'question_id' , 'quiz_id' , 'answer_id'
    ];
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function answer(){
        return $this->belongsTo(Answer::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
