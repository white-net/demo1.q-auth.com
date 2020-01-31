@extends('layouts.master_auth')

@inject('ajaxCtl','App\Http\Controllers\AjaxController')

@section('title', $mailTitle ?? __('display.sendMail title') )

@section('content')
<div class="row">

  <div class="col-md-10 offset-md-1" style="background:#F2F2F2;padding-top:25px;padding-bottom:20px">
    <div class="text-center" style="margin:5px;padding:10px;font-weight: bold;font-size:24px;">{{ $mailTitle ?? '' }}</div>
    <div class="col-md-8 offset-md-2">
      <form action="{{ $url }}" method="POST">
        <div class="form-group">
          <label for="InputEmail">{{ __('display.sendMail mail label')}}</label>
          <input type="email" class="form-control" id="InputEmail" name="Email" required="required" aria-describedby="emailHelp" placeholder="{{ __('display.sendMail mail holder')}}" value="{{ $mailValue ?? '' }}">
          <small class="form-text text-muted">
            <span style="color:blue"> {{ $mailMsg ?? '' }}</span>
          </small>
          <small class="form-text text-muted">
            <span style="color:red;font-weight: bold;"> {!!  $mailExist ?? '' !!}</span>
          </small>
        </div>
        <div class="form-group text-center" style="padding-top:15px">
          <button type="submit" id="btnSubmit" class="btn btn-primary">{{ __('display.sendMail button')}}</button>
        </div>
        {{ csrf_field() }}
      </form>
    </div>
  </div>
</div>
@endsection


@section('styles')
<link href="{{ url('/') }}/css/qauthdemo.css" rel="stylesheet">
@endsection