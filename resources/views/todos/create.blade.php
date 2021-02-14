@extends('layouts.app')

@section('content')


<h1 class="text-center my-5">Create todos</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Create new todo
                </div>

                <div class="card-body"> 
                <!-- msg for validation if some fields in the for are empty -->   
                @if($errors->any())
                    <div class="div alert alert-danger">
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                            <li class="list-group-item">
                            {{$error}}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endif    
                <!-- end msg -->    
                    <form action="/store-todos" method="POST">
                        @csrf <!-- @csrf is to avoid 419 error due to post request -->
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" name="name">
                        </div>

                        <div class="form-group">
                            <textarea name="description" id="" cols="9" rows="5" class="form-control" placeholder="Description"></textarea>
                        </div>

                        <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Create Todo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>     
    </div>



@endsection