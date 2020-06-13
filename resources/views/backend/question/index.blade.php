@extends('backend.layouts.master')

    @section('title','List quiz')
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
                    <h3>All Questions</h3>
                </div>
                <div class="module-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Type</th>  
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($questions)>0)
                                @foreach ($questions as $key=>$question)
                                    <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$question->question}}</td>
                                    <td>{{$question->quiz->name}}</td>
                                    <td>
                                        <a href="{{route('question.show',$question->id)}}" class="btn btn-info">View</a>
                                        
                                        <a href="{{route('question.edit',$question->id)}}" class="btn btn-success">Edit</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$question->id}}">
                                            Delete
                                          </button>
                                          <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route('question.destroy',[$question->id])}}" method="post">@csrf 
                                                        {{method_field('DELETE')}}
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    Are you sure you want to delete this question?
                                                    </div>
                                                    <div class="modal-footer">
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
                            @else
                             <td>No Question Found!</td>
                            @endif
                   
                        </tbody>
                    </table>
                    <div class="pagination pagination-right">
                        {{$questions->links()}}
                    </div>
                      
                </div>
            </div>

            
            
        </div><!--/.content-->
    </div><!--/.span9-->

    @endsection