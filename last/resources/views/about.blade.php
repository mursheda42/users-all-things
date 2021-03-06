@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::User()->email }} </div>
                


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Auth::User()->name }}  <br>
                    {{ Auth::User()->email }}  <br>
                    {{ Auth::User()->password }}  <br>

                    {{ __('You are logged in!') }}
                    {{ __('You are logged in!') }}



                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/category')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Category Name</label>
                                                <input type="name" class="form-control" name="cat_name" placeholder="Category Name" required>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div><!-- panel-body -->
                                    <a href="{{ route('home')}}">Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
