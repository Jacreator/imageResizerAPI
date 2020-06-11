@extends('layouts.app')
@section('content')
<div class="card" style="width: 28rem;">
  <div class="card-body">
    Your access token is: {{ $accessToken}}
  </div>
</div>

@endsection