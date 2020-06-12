@extends('layouts.app')
@section('content')
<div class="card" style="width: 28rem;">
  <div class="card-body">
  <form method="post" action="/authenticate">
  	@csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" name="email" class="form-control" >
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <p><small id="emailHelp" class="form-text text-muted">Don't have an account? <a href="/register">Register</a></small></p>
  </form>
  </div>
</div>

@endsection