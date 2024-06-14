<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi-Penitipan</title>

    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="asset/css/stylelogin.css">

    <!-- plugins -->
    <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="asset/css/plugins/nouislider.min.css" />
    <link rel="stylesheet" type="text/css" href="asset/css/plugins/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.css" />
    <link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" type="text/css" href="asset/css/plugins/bootstrap-material-datetimepicker.css" />
    <link rel="shortcut icon" href="asset/img/logo.png">

</head>

<body class="bg-teal">
    <div class="panel">
        <div class="panel-left">
            <div class="panel-heading bg-teal">
                <h4 class="animated zoomIn">Menu Masuk</h4>
            </div>
            <div class="panel-body form-container">
                <form action="{{ route('login-proses') }}" method="POST">
                    @csrf
                    <div class="form-group form-animate-text">
                        <input type="text" class="form-text @error('username') is-invalid @enderror"
                            id="validate_username" name="username" value="{{ old('username') }}">
                        @if ($errors->has('email'))
                            <span class="bar">{{ $errors->first('username') }}</span>
                        @endif
                        <label>Username</label>
                    </div>

                    <div class="form-group form-animate-text">
                        <input type="password" class="form-text @error('password') is-invalid @enderror"
                            id="validate_password" name="password">
                        @if ($errors->has('password'))
                            <span class="bar">{{ $errors->first('password') }}</span>
                        @endif
                        <label>Password</label>
                    </div>
                    <input class="submit btn btn-info" type="submit" value="Log-In" name="signup">
                </form>
            </div>
        </div>
        <div class="panel-right"></div>
    </div>
</body>

</html>
