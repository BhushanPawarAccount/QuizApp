@extends('backend.layouts.master')

    @section('title','User Exam')
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
                    <h3>Users Results</h3>
                </div>
                <div class="module-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Quiz</th>
                            <th>Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($quizzes)>0)
                            @php
                                $i = 1;
                            @endphp
                             @foreach ($quizzes as $quiz)
                                @foreach($quiz->users as $k=>$user)
                               
                                    <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$quiz->name}}</td>
                                    <td>
                                        <a href="/quiz/{{$quiz->id}}/question" class="btn btn-info">View Questions</a>
                                        <a href="/results/{{$user->id}}/{{$quiz->id}}" class="btn btn-success">View Results</a>
                                        
                                    </td>
                                    
                                    </tr>
                                @endforeach
                                @endforeach
                            @else
                             <td>No Quiz Found!</td>
                            @endif
                   
                        </tbody>
                    </table>
                   
                      
                </div>
            </div>

            
            
        </div><!--/.content-->
    </div><!--/.span9-->

    @endsection