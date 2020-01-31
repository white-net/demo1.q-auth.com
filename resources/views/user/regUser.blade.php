@extends('layouts.master_auth')

@inject('ajaxCtl','App\Http\Controllers\AjaxController')

@section('title', __('display.Sign Up'))

@section('content')
<div class="row">
  <div class="col-md-10 offset-md-1" style="background:#F2F2F2;padding-top:25px;padding-bottom:20px">
    <div class="col-md-8 offset-md-2">
      <form action="{{ route('user.regUser') }}" method="POST">
        <div class="form-group">
          <label for="InputName"> {{ __('display.reg name label')}}</label>
          <input type="text" class="form-control" name="userName" id="InputName" required="required" aria-describedby="nameHelp" placeholder="{{ __('display.reg name holder')}}" value="{{ $nameValue ?? '' }}">
        </div>
        <div class="form-group">
          <label for="InputEmail">{{ __('display.reg mail label')}}</label>
          <input type="email" class="form-control" id="InputEmail" name="Email" required="required" aria-describedby="emailHelp" placeholder="{{ __('display.reg mail holder')}}" value="{{ $mailValue ?? '' }}">
          <small class="form-text text-muted">
            <font color="red"> {{ $mailExist ?? "" }}</font>
          </small>

        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-8">
              <label for="InputDevID">{{ __('display.reg mobileChk label1')}}</label>
              <input type="text" class="form-control" id="InputDevID" required="required" aria-describedby="devIDHelp" placeholder="{{ __('display.reg mobileChk holderNO')}}" disabled>
              <small id="devIDHelp" class="form-text text-muted">{!! __('display.reg mobileChk label2') !!}</small>
              <small class="form-text text-muted"> {!! $ajaxCtl->SmartPhoneLabel() !!}</small>
            </div>
            <div class="col-md-4">
              <!-- QR認証のQRコード表示部分 スタート-->
              <div style="text-align: center;">
                {!! $ajaxCtl->SmartPhoneLink() !!}
              </div>
              <!-- QR認証のQRコード表示部分 エンド-->
            </div>
          </div>
        </div>

        <div style="text-align: center;margin:20px;">
          <a href="https://itunes.apple.com/jp/genre/ios-仕事効率化/id6007?mt=8" target="_blank">
            <img src="/img/app_btn_s2.jpg" style="position: absolute; opacity: 0;">
            <img src="/img/app_btn.jpg" width="150" alt="Download on the App Store">
          </a>
          <!-- <img src="/img/app_qr.jpg" width="75" height="75" alt="" class="pr64"> -->
          <a href="https://play.google.com/store/apps" target="_blank">
            <img src="/img/g_btn_s2.jpg" style="position: absolute; opacity: 0;">
            <img src="/img/g_btn.jpg" width="150" alt="GET IN ON Google Play">
          </a>
          <!-- <img src="./img/g_qr.jpg" width="75" height="75" alt=""> -->
        </div>
    </div>


    <div class="form-group text-center" style="padding-top:15px">
      <button type="submit" id="btnSubmit" class="btn btn-primary">{{ __('display.reg button')}}</button>
    </div>
    <input type="hidden" class="form-control" name="thisfname" value="<?php echo explode('?', $_SERVER["REQUEST_URI"])[0] ?>">
    {{ csrf_field() }}
    </form>
  </div>
</div>
</div>

@endsection

@section('scripts')
<script src="{{ url('/') }}/js/jquery.qrcode.min.js"></script>
<script src="{{ url('/') }}/js/regUser.js"></script>
@endsection

@section('styles')
<link href="{{ url('/') }}/css/qauthdemo.css" rel="stylesheet">
@endsection