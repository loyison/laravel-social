@extends('layouts.master') <!-- extending the master.blade file-->

@section('title')
    Welcome!
@endsection

<!-- content section of the page goes here--> 
@section('content')
    <div class="row">
    <!--sign up form -->
        <div class="col-md-6">
        <h3>Sign Up</h3>
            <form action="{{ route('signup')}}" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                 <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name">
                </div>
                 <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
<!--sign in form -->
        <div class="col-md-6">
        <h3> Sign In </h3>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                 <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection