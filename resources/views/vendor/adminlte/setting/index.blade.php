@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-12">
			<section class="content-header">
		      <h1>
		        Setting Produk
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-building"></i> Setting Produk</a></li>
		        <li><a href="#" class="active">Setting Produk</a></li>
		      </ol>
		    </section>

		    <!-- Main content -->
		    <section class="content">
		      <div class="row">
		        <div class="col-xs-12">
		          <div class="box">
		            <div class="box-header">
		              <h3 class="box-title">Setting Produk</h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
			            {!! Form::open(['route' => ['setting.update',$setting->id], 'method' => 'put','id'=>'form-setting']) !!}
		                    <div class="col-md-6 col-sm-12 col-xs-12">
		                        <div class="form-group {!! $errors->has('province_id') ? 'has-error' : '' !!}">
		                            {!! Form::label('province_id', 'Provinsi') !!}
		                            {!! Form::select('province_id',$province, isset($setting) ? $setting->province_id: null , ['class'=>'form-control']) !!}
		                            {!! $errors->first('province_id', '<p class="help-block">:message</p>') !!}
		                        </div>
		                    </div>
		                    <div class="col-md-6 col-sm-12 col-xs-12">
		                        <div class="form-group {!! $errors->has('city_id') ? 'has-error' : '' !!}">
		                            {!! Form::label('city_id', 'Kota/Kabupaten') !!}
		                            {!! Form::select('city_id',$city, isset($setting) ? $setting->city_id: null , ['class'=>'form-control']) !!}
		                            {!! $errors->first('city_id', '<p class="help-block">:message</p>') !!}
		                        </div>
		                    </div>
		                    <div class="col-md-6 col-sm-12 col-xs-12">
		                        <div class="form-group {!! $errors->has('berat') ? 'has-error' : '' !!}">
		                            {!! Form::label('berat', 'Berat Kalender (Dalam gram)') !!}
		                            {!! Form::number('berat', isset($setting) ? $setting->berat: null , ['class'=>'form-control numericOnly','min'=>1]) !!}
		                            {!! $errors->first('berat', '<p class="help-block">:message</p>') !!}
		                        </div>
		                    </div>
		                    <div class="col-md-6 col-sm-12 col-xs-12">
		                        <div class="form-group {!! $errors->has('harga') ? 'has-error' : '' !!}">
		                            {!! Form::label('harga', 'Harga Kalender') !!}
		                            {!! Form::text('harga', isset($setting) ? $setting->harga: null , ['class'=>'form-control price']) !!}
		                            {!! $errors->first('harga', '<p class="help-block">:message</p>') !!}
		                        </div>
		                    </div>
		                    <div class="col-lg-12 col-md-12 col-xs-12">
		                        <button class="btn button btn-block btn-success" type="button" id="confirm">Simpan</button>
		                    </div>
		                {!! Form::close() !!}
		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->
		        </div>
		        <!-- /.col -->
		      </div>
		      <!-- /.row -->
		    </section>
		</div>
	</div>
</div>
  
@endsection
@section('additional-script')
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
        var form = $('#form-setting');
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
    @if(session()->exists('status'))
		swal("Thanks!", "Succes update", "success")
	@endif
</script>
@endsection