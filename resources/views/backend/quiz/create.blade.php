@extends('backend.layouts.master')

    @section('title','Create quiz')
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



                        <form class="" method="POST" action="{{route('quiz.store')}}">
                            @csrf
                            <div class="control-group">
                                <label class="control-label" for="name">Quiz name</label>
                                <div class="controls">
                                    <input type="text" name="name" id="name" placeholder="Name of quiz" value="{{old('name')}}" class="span8">
                                    @error('name') <span class="invalid-feedback error" role="alert">{{$message}}</span> @enderror
                                    <!--<span class="help-inline">Minimum 5 Characters</span>-->
                                </div>
                           
                                <label class="control-label" for="basicinput">Quiz Description</label>
                                <div class="controls">
                                    <textarea name="description" id="description" placeholder="Enter quiz description" rows="5"  class="span8">{{old('description')}}</textarea>
                                    @error('description') <span class="invalid-feedback error" role="alert">{{$message}}</span> @enderror
                                </div>

                                <label class="control-label" for="name">Minutes</label>
                                <div class="controls">
                                    <input type="text" name="minutes" id="minutes" placeholder="Quiz minutes" value="{{old('minutes')}}" class="span8">
                                    @error('minutes') <span class="invalid-feedback error" role="alert">{{$message}}</span> @enderror
                                    <!--<span class="help-inline">Minimum 5 Characters</span>-->
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