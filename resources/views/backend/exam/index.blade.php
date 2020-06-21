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
                    <h3>Users Exam</h3>
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
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$quiz->id}}">
                                            Remove
                                          </button>
                                          <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$quiz->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route('exam.remove')}}" method="post">@csrf 
                                                   
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    Are you sure you want to remove this exam?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name='user_id' value="{{$user->id}}" />
                                                        <input type="hidden" name='quiz_id' value="{{$quiz->id}}" />
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
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