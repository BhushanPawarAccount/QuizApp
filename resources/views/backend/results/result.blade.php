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
                    <h3>User Quiz Result</h3>
                </div>
                <div class="module-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Quiz</th>
                            <th>Total Question</th>
                            <th>Attempted Question</th>
                            <th>Correct Answer</th>
                            <th>Wrong Answer</th>
                            <th>Percentage</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($quiz as $k=>$q)
                               
                                    <tr>
                                    <td>{{$k+1}}</td>
                                    <td>{{$q->name}}</td>
                                    <td>{{$totalQuestions}}</td>
                                    <td>{{$attemptQuestion}}</td>
                                    <td>{{$user_corrected_ans}}</td>
                                    <td>{{$user_wrong_ans}}</td>
                                    <th>{{round($percent,2)}}</th>
                                    </tr>
                                @endforeach
                               
                   
                        </tbody>
                    </table>
                    <hr/>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                             <th>Question</th>
                            <th>Answer Given</th>
                            <th>Result</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $k=>$result)
                               
                                    <tr>
                                    <td>{{$k+1}}</td>
                                    <td>{{$result->question->question}}</td>
                                    <td>{{$result->answer->answer}}</td>
                                    @if($result->answer->is_correct)
                                     <td><span class="badge badge-success">Correct</span></td>
                                    @else
                                        <td><span class="badge badge-danger">Wrong</span></td>
                                    @endif
                                   
                                    </tr>
                                @endforeach
                               
                   
                        </tbody>
                    </table>
                   
                      
                </div>
            </div>

            
            
        </div><!--/.content-->
    </div><!--/.span9-->

    @endsection