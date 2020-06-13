@extends('backend.layouts.master')

    @section('title','View Questions')
    @section('content')
    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{Session::get('message')}} </strong>
                </div>
            @endif
            @foreach($quizzes as $quiz)
            <div class="module">
                <div class="module-head">
                    <h3>{{$quiz->name}}</h3>
                    <span class="pull-right"><a href="{{url('/quiz')}}" class="btn btn-success">BACK</a></span>
                </div>
                <div class="module-body">
                    @foreach ($quiz->questions as $key=>$ques)
                                   
                   <table class="table table-striped">
                        <tbody>
                            <tr class="read">
                                    {{$ques->question}}
                                <td class="cell-author">
                                    @foreach($ques->answers as $key=>$answer)
                                       <p>{{$key+1}} : {{$answer->answer}}
                                        @if ($answer->is_correct)
                                            <span class="badge badge-success ">Correct</span>
                                        @endif
                                    </p>
                                    @endforeach
                                </td>        
                            </tr>
                              
                   
                        </tbody>
                    </table>
                    @endforeach
                           
                </div>
                
            </div>
            @endforeach
            
            
        </div><!--/.content-->
    </div><!--/.span9-->

    @endsection