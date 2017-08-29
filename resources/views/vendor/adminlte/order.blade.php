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
    </div> <!--hero-container-->

</div><!--hero-background-->
<div class="white-section">
   
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center;">Silahkan lengkapi form berikut untuk memesan kalender HSI</h1>
                <br>
                <br>
                {!! Form::open(['route' => 'order', 'method' => 'post','id'=>'form-order']) !!}
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {!! $errors->has('nip') ? 'has-error' : '' !!}">
                            {!! Form::label('nip', 'NIP HSI (Kosongkan jika bukan member HSI)') !!}
                            {!! Form::text('nip', isset($model) ? $model->nip: null , ['class'=>'form-control']) !!}
                            {!! $errors->first('nip', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {!! $errors->has('nama') ? 'has-error' : '' !!}">
                            {!! Form::label('nama', 'Nama') !!}
                            {!! Form::text('nama', isset($model) ? $model->nama: null , ['class'=>'form-control']) !!}
                            {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', isset($model) ? $model->email: null , ['class'=>'form-control']) !!}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {!! $errors->has('no_wa') ? 'has-error' : '' !!}">
                            {!! Form::label('no_wa', 'Nomor Whatsapp') !!}
                            {!! Form::text('no_wa', isset($model) ? $model->no_wa: null , ['class'=>'form-control']) !!}
                            {!! $errors->first('no_wa', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {!! $errors->has('province_id') ? 'has-error' : '' !!}">
                            {!! Form::label('province_id', 'Provinsi') !!}
                            {!! Form::select('province_id',$province, isset($model) ? $model->province_id: null , ['class'=>'form-control']) !!}
                            {!! $errors->first('province_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {!! $errors->has('city_id') ? 'has-error' : '' !!}">
                            {!! Form::label('city_id', 'Kota/Kabupaten') !!}
                            {!! Form::select('city_id',[''=>'Pilih Kota/Kabupaten'], isset($model) ? $model->city_id: null , ['class'=>'form-control']) !!}
                            {!! $errors->first('city_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group {!! $errors->has('alamat') ? 'has-error' : '' !!}">
                            {!! Form::label('alamat', 'Alamat Detail') !!}
                            {!! Form::textarea('alamat', isset($model) ? $model->alamat: null , ['class'=>'form-control','style'=>'height:150px']) !!}
                            {!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {!! $errors->has('jumlah_order') ? 'has-error' : '' !!}">
                            {!! Form::label('jumlah_order', 'Jumlah Kalender') !!}
                            {!! Form::number('jumlah_order', isset($model) ? $model->jumlah_order: null , ['class'=>'form-control numericOnly','min'=>1]) !!}
                            {!! $errors->first('jumlah_order', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {!! $errors->has('donasi_hsi') ? 'has-error' : '' !!}">
                            {!! Form::label('donasi_hsi', 'Donasi HSI') !!}
                            {!! Form::text('donasi_hsi', isset($model) ? $model->donasi_hsi: null , ['class'=>'form-control price']) !!}
                            {!! $errors->first('donasi_hsi', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <button class="btn button btn-block btn-success" type="button" id="confirm">Konfirmasi</button>
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
<script>
    $("#province_id").on('change',function(){
        $.get('/province/get_city/' + $("#province_id").val(), function(city)
        {
            var $city_id = $('#city_id');
 
            $city_id.find('option').remove().end();
 
            $.each(city, function(index, city) {
                $city_id.append('<option value="' + index + '">' + city + '</option>');
            });
        });
    });
    $('.price').priceFormat({
        prefix: '',
        centsSeparator: '.',
        thousandsSeparator: ',',
        centsLimit: 0
    });
    $('.numericOnly').keyup(function () {
        if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
          this.value = this.value.replace(/[^0-9\.]/g, '');
        }
    });
    $( "#confirm" ).click(function() {
        var form = $('#form-order');
        swal({
          title: 'PERHATIAN',
          text: 'Apakah data yang dimasukan sudah benar ?',
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#5cb85c",
          cancelButtonText : 'Tidak',
          confirmButtonText: 'Ya',
          closeOnConfirm: false
        },
        function(){
          form.submit();
        });
    });
</script>
</body>

</html>