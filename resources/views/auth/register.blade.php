@extends('layouts.app')
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Registerpage</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet" href="/css/styles.css">

    <script src="/js/prefixfree.min.js"></script>
@section('content')
<div class="login container-fluid" id="app">
        <div class="row mh-100vh">
            <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
                <div class="m-auto w-lg-75 w-xl-50">
                    <h2>Register</h2>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group ">
                            <label for="name" class="text-secondary">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="form-group">
                            <label for="email" class="text-secondary">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                            <label for="password" class="text-secondary">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>                     

                        <div class="form-group ">
                            <label for="password-confirm" class="text-secondary">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="roleoptions" id="role1" value="Facilitator">
                            <label class="form-check-label" for="inlineRadio1">Facilitator</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="roleoptions" id="role2" value="Client" checked>
                            <label class="form-check-label" for="inlineRadio2">Client</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="roleoptions" id="role3" value="Admin" disabled>
                            <label class="form-check-label" for="inlineRadio3">admin (disabled)</label>
                            </div>
                                <button type="submit" class="btn btn-info mt-2" style="background-color: rgb(0,204,0);"> 
                                    {{ __('Register') }}
                                </button>
                    </div>                    
                    </form>
                </div>
                 <div class="col-auto col-lg-6 text-left d-lg-flex d-flex align-items-end align-self-stretch mx-auto align-items-lg-start" id="bg-block" style="background-image: url(&quot;/img/cuk.JPG&quot;);background-size: cover;background-position: right;">
                <p class="ml-auto small text-dark mb-2">
                <a class="text-dark" href="https://unsplash.com/photos/v0zVmWULYTg?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText" target="_blank"></a><br></p>
            </div>
        </div>
    </div>
  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>

@endsection
