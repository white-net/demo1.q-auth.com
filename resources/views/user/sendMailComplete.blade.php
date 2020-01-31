@extends('layouts.master_auth')

@section('title', $mailTitle ?? __('display.sendMail title') )

@section('content')
<div class="row">
  <div class="col-md-10 offset-md-1" style="background:#F2F2F2;padding-top:25px;padding-bottom:20px">
    <div class="col-md-8 offset-md-2" style="text-align:center;font-weight: bold;">
       {!! $mailSendCompleteMsg ?? '' !!}
    </div>
  </div>
</div>
@endsection


@section('styles')
<link href="{{ url('/') }}/css/qauthdemo.css" rel="stylesheet">
@endsection