@extends('layouts.master_auth')

@inject('ajaxCtl','App\Http\Controllers\AjaxController')

@section('title', __('display.restart proc title') )

@section('content')
<div class="row">

  <div class="col-md-10 offset-md-1" style="background:#F2F2F2;padding-top:25px;padding-bottom:20px">
    <div class="text-center" style="margin:5px;padding:10px;font-weight: bold;font-size:24px;">{{ __('display.restart proc title') }}</div>
    <div class="col-md-8 offset-md-2">
      @if($procMsg)
      <div class="text-center" style="height:60px;margin-top:10px;">
        <span style="font-weight: bold;"> {!! $procMsg ?? '' !!}</span>
      </div>
      @else
      <form action="{{ route('user.restartproc') }}" name="conformRestart" method="POST">
        <div class="form-group">
          <input type="hidden" name="reqToken" id="reqToken" value="{{ $token ?? '' }}">
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-8">
              <label for="InputDevID">{{ __('display.reg mobileChk label1')}}</label>
              <input type="text" class="form-control" id="InputDevID" required="required" aria-describedby="devIDHelp" placeholder="未確認" disabled>
              <small id="devIDHelp" class="form-text text-muted">{!! __('display.reg mobileChk label2') !!}</small>
              <small class="form-text text-muted"> {!! $ajaxCtl->SmartPhoneLabel() !!}</small>
            </div>
            <div class="col-md-4">
              <!-- QR認証のQRコード表示部分 スタート-->
              <div style="text-align: center;">
                {!! $ajaxCtl->SmartPhoneLink() !!}
              </div>
              <div id="result" style="text-align: center;margin:20px;">
              </div>
              <!-- QR認証のQRコード表示部分 エンド-->
            </div>
          </div>
        </div>
        <div class="form-group text-center" style="padding-top:15px">
          <button type="submit" id="btnSubmit" class="btn btn-primary">{{ __('display.restart proc button')}}</button>
        </div>
        {{ csrf_field() }}
      </form>
      @endif
    </div>
  </div>
</div>
@endsection

@section('scripts')
  @if(!$procMsg)
  <script src="{{ url('/') }}/js/jquery.qrcode.min.js"></script>
  <script src="{{ url('/') }}/js/restartUser.js"></script>
  @endif
@endsection

@section('styles')
<link href="{{ url('/') }}/css/qauthdemo.css" rel="stylesheet">
@endsection