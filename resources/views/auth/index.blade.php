<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hotel Booking:: Admin Login</title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('assets/backend/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('assets/backend/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Animate.css -->
    <link href="{{ URL::asset('assets/backend/css/animate/animate.min.css') }}" rel="stylesheet">
    <!-- PNotify -->
    <link href="{{ URL::asset('assets/backend/css/pnotify/pnotify.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/backend/css/pnotify/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/backend/css/pnotify/pnotify.nonblock.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('assets/backend/css/custom.min.css') }}" rel="stylesheet">


</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signin"></a>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{ route('adminLogin') }}" method="POST">
                        @csrf
                        <h1>Login Form </h1>

                        <div>
                            <input type="text" class="form-control " value="{{ old('username') }}" name="username" placeholder="Email or Username"  />

                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="Password"  />
                        </div>
                        <div style="text-align: start;">
                            <label for="remember">
                                <input type="checkbox" name="remember" {{ old('remember')? "checked":"" }} value="1" id="remember" > Remember Me.
                            </label>
                        </div>
                        <div>
                            <button class="btn btn-secondary w-100 submit" type="submit">Log in</button>
                            <input type="hidden" name="form-sub" value="1">
                        </div>

                        <div class="separator">
                            <div>
                                <h1><i class="fa fa-hotel"></i>
                                     !
                                </h1>
                                <p>
                                    ©2023 All Rights Reserved. ! is a Bootstrap 4 template. Privacy and Terms
                                </p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ URL::asset('assets/backend/js/jquery/jquery.min.js') }}"></script>
    <!-- PNotify -->
    <script src="{{ URL::asset('assets/backend/js/pnotify/pnotify.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/js/pnotify/pnotify.buttons.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/js/pnotify/pnotify.nonblock.js') }}"></script>
@error('username')
    <script>
        new PNotify({
              title: 'Error',
              text: '{{ $message }}',
              type: 'error',
              styling: 'bootstrap3'
        })
    </script>
@enderror
@error('password')
    <script>
        new PNotify({
              title: 'Error',
              text: '{{ $message }}',
              type: 'error',
              styling: 'bootstrap3'
        })
    </script>
@enderror
@error('message')
    <script>
        new PNotify({
              title: 'Error',
              text: '{{ $message }}',
              type: 'error',
              styling: 'bootstrap3'
        })
    </script>
@enderror
</body>

</html>
