@extends('auth.layouts.main')

@section('content')

@php 
    if(isset($_SESSION['redirect']) && $_SESSION['redirect'] != null){
        $redirect = $_SESSION['redirect'];
        unset($_SESSION['redirect']);
    }else{
        $redirect = '';
    }
@endphp


    <div id="mws-login">
        <h1><img src="/images/mws-logo.png" style="height:50px;width:300px;"></h1>
        <div class="mws-login-lock"><i class="icon-lock"></i></div>
        <div id="mws-login-form">
            <form class="mws-form" action="{{ route('login') }}" method="post">
                @csrf

                <?php if(isset($_REQUEST['error']) && $_REQUEST['error'] == 10){ ?>
                    <div class="mws-form-item">
                        <p style="color:#67acdd;text-decoration:none;font-weight:bold;margin-top: 10px;text-align: center;margin-bottom: -5px;">Tu password ha sido reenviado a tu email</p>
                    </div>
                <?php } ?>
                <div class="mws-form-row">
                    <div class="mws-form-item">
                        <input type="text" name="email" class="mws-login-username required @error('email') error @enderror" placeholder="email">
                    </div>
                </div>
                <div class="mws-form-row">
                    <div class="mws-form-item">
                        <input type="password" name="password" class="mws-login-password required  @error('password') error @enderror" placeholder="password">
                    </div>
                </div>
                    <input type="hidden" name="redirect" value="<?php echo $redirect ?>" />
                    <div class="mws-form-item">

                            <a href="/forgot.php" style="color:#67acdd;text-decoration:none;font-weight:bold;">Olvidaste tu contraseña?</a>
                    </div>

                <div class="mws-form-row">
                    <input type="submit" value="Login" class="btn btn-primary mws-login-button">
                </div>
            </form>
        </div>
    </div>




<!--div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div-->
@endsection
