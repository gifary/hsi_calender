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

</head>

<body>

<!-- Navigation
    ================================================== -->
<div class="hero-background">
   
    <div class="container">
        <div class="header-container header">
            <a class="navbar-brand logo" href="#"> <img class="logo" src="" alt="LOGO HSI" /> </a>
            <a href="{{route('order')}}">
                <button class="header-btn"> Order NOW!</button>
            </a>
            <div class="header-left">
                <a class="navbar-item" href="{{ url('/') }}">Home</a>
            </div>
        </div>
        <!--navigation-->


        <!-- Hero-Section
          ================================================== -->

        <div class="hero row">
            <div class="hero-right col-sm-6 col-sm-6">
                <h1 class="header-headline bold"> Beautiful Free Nova template <br></h1>
                <h4 class="header-running-text light"> A top notch premium quality template for your next
                    web project.</h4>
                <a href="{{route('order')}}">
                    <button class="hero-btn"> Order NOW!!</button>
                </a>
            </div><!--hero-left-->

            <div class="col-sm-6 col-sm-6 ipad">
                <img class="ipad-screen img-responsive" src="assets/images/screen.png" alt="image kalender" />
            </div>
        </div><!--hero-->

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

<script src="{{ url (mix('/js/app-landing.js')) }}"></script>
<script src="{{ url (mix('/js/all-landing.js')) }}"></script>

</body>

</html>