@extends('backend.layouts.master')

    @section('title','View Question')
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
                    <h3>View Question</h3>
                    <span class="pull-right"><a href="{{url('/question')}}" class="btn btn-success">BACK</a></span>
                </div>
                <div class="module-body">
                    <h2>{{$question->question}}</h2><small>{{$question->quiz->name}}</small>
                  
                    <table class="table table-striped">
                       
                        <tbody> 
                            @foreach ($question->answers as $key=>$answer)
                            <tr class="read">
                                <td>{{$key+1}}</td>
                                <td class="cell-author">
                                        {{$answer->answer}}
                                        @if ($answer->is_correct)
                                            <span class="badge badge-success pull-right">Correct</span>
                                        @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>

            
            
        </div><!--/.content-->
    </div><!--/.span9-->

    @endsection