<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;
use App\Quiz;
use App\Question;
class Question extends Model
{
    protected $fillable = [
        'question', 'quiz_id'
    ];
    private $limit = 10;
    private $order = 'DESC';
    //Model Relationship
    public function answers(){
        return $this->hasMany(Answer::class);
    }
    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    //Model Functions
    public function storeQuestion($data){
        return Question::create($data);
    }
    public function allQuestion(){
        return Question::orderBy('created_at',$this->order)->with('quiz')->paginate($this->limit);
    }
    public function getQuestion($id){
        return Question::find($id);
    }
    public function updateQuestion($data,$id){
        $question = Question::find($id);
        $question->question = $data['question'];
        $question->quiz_id = $data['quiz_id'];
        $question->save();
        return $question;
    }
    public function deleteQuestion($id){
        return Question::find($id)->delete();
    }
}
