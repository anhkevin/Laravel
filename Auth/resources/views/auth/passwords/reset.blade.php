@extends('auth.layouts.master')
@section('title','Reset Password')
@section('content') 
<div class="login-box">
  <div class="login-logo">
    <a href="{{ Route('login') }}"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset Password</p>

    <form action="{{ Route('postResetPassword') }}" method="post">
      {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" value="{{old('password')}}" placeholder="Password">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}" placeholder="Password confirmation">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      @if (count($errors) >0)
         <ul>
             @foreach($errors->all() as $error)
                 <li class="text-danger"> {{ $error }}</li>
             @endforeach
         </ul>
     @endif

     @if (session('status'))
         <ul>
             <li class="text-danger"> {{ session('status') }}</li>
         </ul>
     @endif
      <div class="row">
        <div class="col-xs-12">
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="token" value="{{ $token }}">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
      </div>
      <!-- /.col -->
      </div>
    </form>

    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@stop