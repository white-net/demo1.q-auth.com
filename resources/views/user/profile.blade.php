@extends('layouts.master_auth')

@section('content')

<div class="row">
    <div class="col-md-10 offset-md-1" style="background:#F2F2F2;padding-top:25px;padding-bottom:20px">
        <h3 style="color:darkcyan">{{ __('display.profile title')}}</h3>

        <div style="margin-top: 30px;">
            <table class="table">
                <tr>
                    <th>{{ __('display.profile name label')}}</th>
                    <td>{{ $name }}</td>
                </tr>
                <tr>
                    <th>{{ __('display.profile mail label')}}</th>
                    <td>{{ $email }}</td>
                </tr>
            </table>

        </div>
    </div>
</div>
@endsection

@section('styles')
<link href="{{ url('/') }}/css/qauthdemo.css" rel="stylesheet">
@endsection