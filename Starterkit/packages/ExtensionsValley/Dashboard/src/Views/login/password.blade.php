<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title}} </title>
    @if(\WebConf::get('fav_icon') != "")
        <link rel="shortcut icon" href="{{URL::to('/')}}/{{ \WebConf::get('fav_icon') }}"/>
@endif

    <!-- Bootstrap -->
    <link href="{{asset("packages/extensionsvalley/dashboard/css/bootstrap.min.css")}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset("packages/extensionsvalley/dashboard/css/font-awesome.min.css")}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{asset("packages/extensionsvalley/dashboard/css/custom.min.css")}}" rel="stylesheet">
    <link href="{{asset("packages/extensionsvalley/dashboard/css/core-admin.css")}}" rel="stylesheet">

</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        @if(Session::has('message'))
                            <div class="message alert alert-success  col-md-12 text-center">{{ Session::get('message') }}</div>
                        @endif
                        @if(Session::has('error'))
                            <div class="message alert alert-danger  col-md-12 text-center">{{ Session::get('error') }}</div>
                        @endif
                        @if(Session::has('warning'))
                            <div class="message alert alert-warning  col-md-12 text-center">{{ Session::get('warning') }}</div>
                        @endif
                    </div>
                </div>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Your email address</h3>
                    </div>

                    <div class="panel-body">

                        {!!Form::open(array('route' => 'extensionsvalley.admin.passwordreset', 'method' => 'post'))!!}

                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus
                                       required>
                                <span class="error_red"> {{ $errors->first('email') }}</span>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>

                        </fieldset>
                        {!! Form::token() !!}
                        {!! Form::close() !!}
                        <div class="pull-left" style="padding-top:10px;"><a href="{{route('extensionsvalley.admin.login')}}">Back
                                to Login</a></div>
                    </div>
                </div>
            </section>
            <center><h3>{{\WebConf::get('site_name')}}</h3>
                <p> {{\WebConf::get('copy_right')}} <br/> Powered by <b><a
                                            href="http://walkswithme.net/contact-me">WWM Laravel Admin</a></b></p>
            </center>
        </div>

    </div>
</div>
</body>
</html>
