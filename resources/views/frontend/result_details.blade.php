@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="col-md-8">
            <center><h2>Your Result</h2></center>
            @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
            @foreach ($results as $key=>$result)
            <div class="card">
                <div class="card-header">{{$key+1}}</div>
                <div class="card-body">
                    <p>
                        <h3>{{$result->question->question}}</h3>
                    </p>
                    @php
                        $i=1;
                        $answers = DB::table('answers')->where('question_id',$result->question_id)->get();
                        foreach ($answers as $ke => $ans) {
                           echo '<p>'.$i++.')'.$ans->answer.'</p>';
                          
                        }
                    @endphp
                    <p>
                        Your Answer : {{$result->answer->answer}}
                    </p>
                    @php
                    $answers = DB::table('answers')->where('question_id',$result->question_id)->where('is_correct',1)->get();
                    foreach ($answers as $ke => $ans) {
                       echo '<p> Correct Answer : '.$ans->answer.'</p>';
                      
                    }
                @endphp
                @if($result->answer->is_correct)
                    <span class="badge badge-success">Correct</span>
                @else
                <span class="badge badge-danger">In-Correct</span>
                @endif
                </div>

            </div>
            @endforeach
           
         </div>
    </div>
</div>
@endsection