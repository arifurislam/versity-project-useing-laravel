<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>log-in</title>
    <link href="{{asset('admin')}}/css/style.css" rel="stylesheet">
    <title>@yield('title','admin')</title>

</head>

<body class="h-100">

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <div class="text-center">
                                    <img height="30px" src="{{asset('admin/images/front-end-logo.png')}}" alt="logo">
                                </div>
                                <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" :value="old('email')" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <button class="btn login-form__btn submit w-100" type="submit">Log In</button>
                                </form>
                                <p class="mt-5 login-form__footer">Dont have account? <a href="{{url('/register')}}"
                                        class="text-primary">Sign Up</a> now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('admin')}}/plugins/common/common.min.js"></script>
    <script src="{{asset('admin')}}/js/custom.min.js"></script>
    <script src="{{asset('admin')}}/js/settings.js"></script>
    <script src="{{asset('admin')}}/js/gleek.js"></script>
    <script src="{{asset('admin')}}/js/styleSwitcher.js"></script>
</body>

</html>
