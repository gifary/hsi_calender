<html>

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HSI Kalender</title>
    <meta name="Nova theme" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
   {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <style type="text/css">
        .navbar-item{
            color: #fff;
            background-color: #5cb85c;
        }
        .navbar-item:hover{
            color: #fff;
            background-color: #5cb85c;
        }
    </style>
</head>

<body>

<!-- Navigation
    ================================================== -->
<div class="hero-background" style="background:#000c ">

    <div class="container">
        <div class="header-container header">
            <a class="navbar-brand logo" href="#"> <img class="logo" src="" alt="LOGO HSI" /> </a>
            <a href="{{route('order')}}">
                <button class="header-btn"> Order NOW!</button>
            </a>
            <div class="header-left">
                <a class="navbar-item" href="{{ url('/') }}">Home</a>
                <a class="navbar-item" href="{{ url('/konfirmasi') }}">Konfirmasi</a>
            </div>
        </div>
    </div> <!--hero-container-->

</div><!--hero-background-->
<div class="white-section">
   
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center;">Silahkan lengkapi form berikut untuk melakukan konfirmasi</h1>
                <br>
                <br>
                {!! Form::open(['route' => 'konfirmasi', 'method' => 'post','id'=>'form-order','file'=>'true','enctype'=>'multipart/form-data']) !!}
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {!! $errors->has('no_invoice') ? 'has-error' : '' !!}">
                            {!! Form::label('no_invoice', 'No Invoice') !!}
                            {!! Form::text('no_invoice', isset($no_invoice) ? $no_invoice: null , ['class'=>'form-control']) !!}
                            {!! $errors->first('no_invoice', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group {!! $errors->has('bukti_trf') ? 'has-error' : '' !!}">
                            {!! Form::label('bukti_trf', 'Bukti Transfer (Max 1Mb)') !!}
                            {!! Form::file('bukti_trf', ['accept'=>'image/*']) !!}
                            {!! $errors->first('bukti_trf', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <button class="btn button btn-block btn-success" type="submit" id="confirm">Konfirmasi</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div><!--hero-->
        <br>
        <hr>
    </div> <!--hero-container-->

</div><!--hero-background-->

<!-- Footer
  ================================================== -->

<div class="footer">

    <div class="container">
        <div class="row">

            <div class="col-sm-2"></div>

            <div class="col-sm-8 webscope">
                <span class="webscope-text">Copyright © 2017 HSI Abdulah Roy. </span>
                <span class="webscope-text"> A free template by </span>
                <a href="https://webscopeapp.com"> webscopeapp </a>
            </div>
            <!--webscope-->
        </div>
        <!--row-->

    </div>
    <!--container-->
</div>
<!--footer-->

<script src="{{ url (mix('/js/app-landing.js')) }}"></script>
<script src="{{ url (mix('/js/all-landing.js')) }}"></script>
</body>

</html>