@extends('backend.layouts.master')

    @section('title','Create Exam')
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
                    <h3>Create Exam</h3>
                </div>
                <div class="module-body">



                        <form class="" method="POST" action="{{route('exam.store')}}">
                            @csrf
                            <div class="control-group">
                                <label class="control-label" for="quiz_id">Quiz</label>
                                <div class="controls">
                                    <select tabindex="1" name="quiz_id" id="quiz_id" data-placeholder="Select Quiz" class="span8">
                                        @foreach (App\Quiz::all() as $quiz)
                                        <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('quiz_id') <span class="invalid-feedback error" role="alert">{{$message}}</span> @enderror
                                </div>
                           
                                <label class="control-label" for="basicinput">User</label>
                                <div class="controls">
                                    <select tabindex="1" name="user_id" id="user_id" data-placeholder="Select User" class="span8">
                                        @foreach (App\User::where('is_admin','0')->get() as $user)
                                        <option value="{{$user->id}}">{{$user->name}} ({{$user->occupation}})</option>
                                        @endforeach
                                    </select>
                                    @error('user_id') <span class="invalid-feedback error" role="alert">{{$message}}</span> @enderror
                                </div>

                               
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