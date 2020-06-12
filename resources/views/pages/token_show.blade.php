@extends('layouts.app')
@section('content')
<div class="row justify-content-center" style="width: 800px">
	<div class="jumbotron col-md-8">
	  <h1 class="display-4">Hello, {{ Auth::user()->name }}</h1>
	  <p class="lead">Your access token is</p>
	  <hr class="my-4">
	  <p style="overflow-wrap: break-word;">{{ $accessToken}}</p>
	  <a class="btn btn-info btn-lg btn-block" href="#" role="button">Refresh token</a>
	</div>
</div>
@endsection