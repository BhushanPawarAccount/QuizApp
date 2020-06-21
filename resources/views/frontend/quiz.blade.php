@extends('layouts.app')

@section('content')
    <quiz-component 
        :time="{{$quiz->minutes}}"
        :quizId="{{$quiz->id}}"
        :quizz="{{$quiz}}"
        :quiz-questions="{{$quizQuestions}}"
        :has-quiz-played="{{$authUserHasPlayedQuiz}}">

    </quiz-component>
@endsection