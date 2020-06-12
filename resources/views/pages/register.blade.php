@extends('layouts.app')
@section('content')
<div class="card" style="width: 28rem;">
  <div class="card-body">
    <form method="post" action="/save">
    	@csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="name" name="name" class="form-control">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" >
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control">
      </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Confirm password</label>
        <input type="password" name="password_confirmation" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

@endsection