@extends('backend.layouts.master')

    @section('title','Update User')
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
                    <h3>Update User</h3>
                </div>
                <div class="module-body">
                    <form action="{{route('user.update',$user->id)}}" method="POST">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control span6" id="name" placeholder="user name">
                            @error('name') <span class="invalid-feedback error" role="alert">{{$message}}</span> @enderror
                        </div>
                       
                       
                        <div class="form-group">
                            <label for="occupation">Occupation</label>
                            <input type="text" name="occupation" class="form-control span6" id="occupation" value="{{$user->occupation}}" placeholder="Occupation">
                            @error('occupation') <span class="invalid-feedback error" role="alert">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="Address">Address</label>
                            <textarea name="address" class="form-control span6" id="Address" placeholder="Address">{{$user->address}}</textarea>
                            @error('address') <span class="invalid-feedback error" role="alert">{{$message}}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control span6" id="phone" placeholder="Phone number" value="{{$user->phone}}">
                            @error('phone') <span class="invalid-feedback error" role="alert">{{$message}}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>

            
            
        </div><!--/.content-->
    </div><!--/.span9-->

@endsection