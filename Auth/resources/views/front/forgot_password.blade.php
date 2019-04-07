@extends('front.layouts.master')
@section('title','Forgot Password')

@section('content') 
<div class="login-box">
  <div class="login-logo">
    <a href="{{ Route('login') }}"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Forgot Password ?</p>

    <form action="{{ Route('postForgotPassword') }}" method="post">
      {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="text" name="txtEmail" class="form-control" value="{{old('txtEmail')}}" placeholder="Email">
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
        <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password To Mail</button>
      </div>
      <!-- /.col -->
      </div>
    </form>

    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@stop