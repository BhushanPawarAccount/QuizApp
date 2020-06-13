@extends('backend.layouts.master')

    @section('title','Edit Question')
    @section('content')
    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{Session::get('message')}} </strong>
                </div>
            @endif
            <div class="module">
                <div class="module-head">
                    <h3>Create Quiz</h3>
                </div>
                <div class="module-body">

                        <form class="" method="POST" action="{{route('question.update',[$question->id])}}">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="control-group">
                                <label class="control-label" for="question">Question</label>
                                <div class="controls">
                                    <input type="text" name="question" id="question" placeholder="Enter your question" value="{{$question->question}}" class="span8">
                                    @error('question') <span class="invalid-feedback error" role="alert">{{$message}}</span> @enderror
                                    <!--<span class="help-inline">Minimum 5 Characters</span>-->
                                </div>
                           
                                <label class="control-label" for="quiz_id">Quiz Type</label>
                                <div class="controls">
                                    <select tabindex="1" name="quiz_id" id="quiz_id" data-placeholder="Select Quiz" class="span8">
                                        <option value="">Select quiz type</option>
                                        @foreach (App\Quiz::all() as $quiz)
                                        <option value="{{$quiz->id}}" @if($question->quiz_id == $quiz->id)selected @endif>{{$quiz->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('quiz_id') <span class="invalid-feedback error" role="alert">{{$message}}</span> @enderror
                                </div>

                                <label class="control-label" for="Options">Options</label>

                                <div class="controls">
                                    @foreach($question->answers as $i=>$answer)
                                    <input type="text" name="options[]" placeholder="Option{{$i+1}}" value="{{$answer->answer}}" class="span7">

                                    <input type="radio" name="correct_answer" value="{{$i}}" 
                                    @if ($answer->is_correct)
                                        checked
                                    @endif
                                    />
                                    <span>Correct Answer</span>
                                    @error('options') <span class="invalid-feedback error" role="alert">{{$message}}</span> @enderror
                                    @endforeach
                                    <!--<span class="help-inline">Minimum 5 Characters</span>-->
                                </div>

                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>

            
            
        </div><!--/.content-->
    </div><!--/.span9-->

    @endsection