@extends('layouts.master_auth')

@section('title', __('display.Log in'))

@section('content')
  <div class="row">
  <div class="col-md-6 col-md-offset-3">
  <h3>{{ __('display.Sign In') }}</h3>
  @if(count($errors) >0)
  <div class="alert alert-danger">
  @foreach($errors->all() as $error)
  <p>{{ $error }}</p>
  @endforeach
  </div>
  @endif
  <form action="{{ route('user.signin') }}" method="post">
  <div class="form-group">
  <label for="email">{{ __('display.E-Mail') }}</label>
  <input type="text" id="email" name="email" class="form-control">
  </div>
  <div class="form-group">
  <label for="password">{{ __('display.Password') }}</label>
  <input type="password" id="password" name="password" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">{{ __('display.Log in') }}</button>
  {{ csrf_field() }}
  </form>
  </div>
  </div>
@endsection
