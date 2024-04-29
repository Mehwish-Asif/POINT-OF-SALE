@extends('layouts.app')
@section('content')
<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h1 class="text-center mb-4">Sign up your account</h1>

                                    @if(Session::has('error'))
                                 <p class="text-danger">{{session::get('erorr')}}</p>
                                     @endif
                                    <form action="{{ route('register') }}" method="post">
    @csrf
    <div class="form-group">
        <label><strong>Username</strong></label>
        <input type="text" class="form-control" name="name" placeholder="Username">
        @if($errors->has('name'))
        <label><strong style="color: red">{{ $errors->first('name') }}</strong></label>
        @endif
    </div>
    <div class="form-group">
        <label><strong>Email</strong></label>
        <input type="email" class="form-control" name="email" placeholder="hello@example.com">
        @if($errors->has('email'))
        <label><strong style="color: red">{{ $errors->first('email') }}</strong></label>
        @endif
    </div>
    <div class="form-group">
        <label><strong>Password</strong></label>
        <input type="password" class="form-control" name="password" placeholder="Password">
        @if($errors->has('password'))
        <label><strong style="color: red">{{ $errors->first('password') }}</strong></label>
        @endif
    </div>
    <div class="form-group">
        <label><strong>Confirm Password</strong></label>
        <input type="password" class="form-control" name="password_confirmation" placeholder="Password">
        @if($errors->has('password'))
        <label><strong style="color: red">{{ $errors->first('password_confirmation') }}</strong></label>
        @endif
    </div>
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-danger btn-block">Sign me up</button>
    </div>
</form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="/">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>