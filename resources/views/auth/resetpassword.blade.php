@extends('layouts.app')
@section('content')

@if($errors->any())
    @foreach ($errors->all() as $error)
    <p style ="color: red" >{{$error}}</p>
    @endforeach
@endif


<body class="h-100">
    <div class="authincation h-100">
    <div class="container-fluid h-100">
<div class="row justify-content-center h-100 align-items-center">
<div class="col-md-6">
<div class="authincation-content">
<div class="row no-gutters">
<div class="col-xl-12">
<div class="auth-form">
<h4 class="text-center mb-4">Reset Here</h4>
<form action="" method="post">
   @csrf

<div class="form-row d-flex justify-content-between mt-4 mb-2">
{{-- <div class="form-group">
<input type="text" name="id" value="{{$user[0]['id']}}">
</div> --}}

<div class="form-group">
<label><strong>Password</strong></label>
<input type="password" class="form-control" name="password" placeholder="Passoword">
</div>

<div class="form-group">
<label><strong> Confirm Password</strong></label>
<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
</div>
    
         
<button type="submit" class="btn btn-danger btn-block">Reset password</button>
<div class="text-center">


<div class="form-group">
<a href="/">Login</a>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->

</body>

</html>