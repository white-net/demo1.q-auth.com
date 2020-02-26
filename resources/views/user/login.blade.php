@extends('layouts.master_auth')

@inject('ajaxCtl','App\Http\Controllers\AjaxController')

@section('title', __('display.Log in'))

@section('content')

<div class="row">
  <div class="col-md-10 offset-md-1" style="background:#F2F2F2;padding-top:15px;padding-bottom:25px">
      <form action="{{ route('user.login') }}" name="loginForm" method="POST">
        <!-- QR認証のQRコード表示部分 スタート-->
        <div style="text-align: center;margin:20px;">
          <div> {{ __('display.login label1')}}</div>
          <div style="color:#0000ff;">
          {!! __('display.login label2') !!}
          </div>
          {!! $ajaxCtl->SmartPhoneLabel() !!}
        </div>
        <div style="text-align: center;">
          <img src="" id="QrImg">
        </div>
        <div style="text-align: center;">
          <!-- <a id="mobileLink" href="qauthapp://qauth?q=dddifdlfjaisdeojr"> -->
          {!! $ajaxCtl->SmartPhoneLink() !!}
          <!-- </a> -->
        </div>
        <div id="result" style="text-align: center;margin:20px;">
        </div>
        <!-- QR認証のQRコード表示部分 エンド-->
        <div>
          <div style="text-align: center;margin:20px;">
            <!-- a href="https://itunes.apple.com/jp/genre/ios-仕事効率化/id6007?mt=8" target="_blank"-->
              <img src="/img/app_btn_s2.jpg" style="position: absolute; opacity: 0;">
              <img src="/img/app_btn.jpg" width="150" alt="Download on the App Store">
            <!-- /a -->
            <!-- <img src="/img/app_qr.jpg" width="75" height="75" alt="" class="pr64"> -->
            <a href="https://play.google.com/store/apps/details?id=jp.co.whitenet.qauth" target="_blank">
              <img src="/img/g_btn_s2.jpg" style="position: absolute; opacity: 0;">
              <img src="/img/g_btn.jpg" width="150" alt="GET IN ON Google Play">
            </a>
            <!-- <img src="./img/g_qr.jpg" width="75" height="75" alt=""> -->
          </div>
        </div>
        <!--
        <div class="extra-form form-group">
          <div class="col-md-8 offset-md-2">
            <ul>
              <li><a href="/main/regMail.php?action=0">[新規会員登録]</a></li>
              <li><a href="/main/regMail.php?action=1">携帯の紛失ですか？(緊急停止手続き)</a></li>
              <li><a href="/main/regMail.php?action=2">携帯を見つけましたか？(緊急停止解除手続き)</a></li>
            </ul>
          </div>
        </div>
-->
        {{ csrf_field() }}
      </form>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ url('/') }}/js/jquery.qrcode.min.js"></script>
<script src="{{ url('/') }}/js/login.js"></script>
@endsection

@section('styles')
<link href="{{ url('/') }}/css/qauthdemo.css" rel="stylesheet">
@endsection
