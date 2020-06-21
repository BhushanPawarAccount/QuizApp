@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="col-md-8">

            @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
  
            <div class="card">
                <div class="card-header">View Result</div>
                <div class="card-body">
                    
                </div>

            </div>
         </div>
    </div>
</div>
@endsection