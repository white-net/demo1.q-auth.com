@extends('layouts.master_auth')

@inject('ajaxCtl','App\Http\Controllers\AjaxController')

@section('title', __('display.profileEdit title'))

@section('content')
<div class="row">
  <div class="col-md-10 offset-md-1" style="background:#F2F2F2;padding-top:25px;padding-bottom:20px">
    <div class="col-md-8 offset-md-2">
    @if($procMsg)
      <div class="text-center" style="height:60px;margin-top:10px;">
        <span style="font-weight: bold;"> {!! $procMsg ?? '' !!}</span>
      </div>
    @else 
      <div class="text-center" style="height:60px;margin-top:10px;">
        <span style="font-weight: bold;"> {!! $editNone ?? '' !!}</span>
      </div>

      <form action="{{ route('user.editProfile') }}" method="POST">
        <div class="form-group">
          <label for="InputName"> {{ __('display.profileEdit name label')}}</label>
          <input type="text" class="form-control" name="userName" id="InputName" aria-describedby="nameHelp" placeholder="{{ __('display.profileEdit name holder')}}" value="{{ $nameValue ?? '' }}">
        </div>
        <div class="form-group">
          <label for="InputEmail">{{ __('display.profileEdit mail label')}}</label>
          <span style="color:red">*</span>
          <input type="email" class="form-control" id="InputEmail" name="Email" required="required" aria-describedby="emailHelp" placeholder="{{ __('display.profileEdit mail holder')}}" value="{{ $mailValue ?? '' }}">
          <small class="form-text text-muted">
            <font color="red"> {!! $mailExist ?? "" !!}</font>
          </small>
        </div>
        <div class="form-group">
          <label for="InputEmail">{{ __('display.profileEdit newMail label')}}</label>
          <input type="email" class="form-control" id="InputNewEmail" name="newEmail" aria-describedby="emailHelp" placeholder="{{ __('display.profileEdit newMail holder')}}" value="{{ $newMailValue ?? '' }}">
        </div>
        <div class="form-group">
          <label for="InputEmail">{{ __('display.profileEdit newMail1 label')}}</label>
          <input type="email" class="form-control" id="InputNewEmail1" name="newEmail1" aria-describedby="emailHelp" placeholder="{{ __('display.profileEdit newMail1 holder')}}" value="{{ $newMailValue1 ?? '' }}">
          <small class="form-text text-muted">
            <font color="red"> {!! $mailSameCheck ?? "" !!}</font>
          </small>
        </div>

        <div class="form-group text-center" style="padding-top:15px">
          <button type="submit" id="btnSubmit" class="btn btn-primary">{{ __('display.profileEdit button')}}</button>
        </div>
        {{ csrf_field() }}
      </form>
      @endif
    </div>


  </div>
</div>
</div>

@endsection

@section('styles')
<link href="{{ url('/') }}/css/qauthdemo.css" rel="stylesheet">
@endsection