@extends('layouts.master_auth')

@section('title', __('display.stop proc title') )

@section('content')
<div class="row">

  <div class="col-md-10 offset-md-1" style="background:#F2F2F2;padding-top:25px;padding-bottom:20px">
    <div class="text-center" style="margin:5px;padding:10px;font-weight: bold;font-size:24px;">{{ __('display.stop proc title') }}</div>
    <div class="col-md-8 offset-md-2">
    @if($procMsg)
      <div class="text-center" style="height:60px;margin-top:10px;">
        <span style="font-weight: bold;">  {!! $procMsg ?? '' !!}</span>
      </div>
    @else 
      <form action="{{ route('user.stopproc') }}" name="conformStop" method="POST">
        <div class="form-group">
          <div><label for="InputEmail">{{ __('display.stop proc Label')}}</label></div>
          <div>&nbsp; </div>
          <label class="checkbox-inline">
            <input type="checkbox" required="required" value="conform"> {{ __('display.stop proc checkbox')}}
          </label>
          <input type="hidden" name="reqToken" value="{{ $token ?? '' }}">
        </div>
        <div class="form-group text-center" style="padding-top:15px">
          <button type="submit" id="btnSubmit" class="btn btn-primary">{{ __('display.stop proc button')}}</button>
        </div>
        {{ csrf_field() }}
      </form>
    @endif
    </div>
  </div>
</div>
@endsection


@section('styles')
<link href="{{ url('/') }}/css/qauthdemo.css" rel="stylesheet">
@endsection