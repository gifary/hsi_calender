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
		        Data Order
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-building"></i> Data Order</a></li>
		        <li><a href="#" class="active">List Order</a></li>
		      </ol>
		    </section>

		    <!-- Main content -->
		    <section class="content">
		      <div class="row">
		        <div class="col-xs-12">
		          <div class="box">
		            <div class="box-header">
		              <h3 class="box-title">List Order</h3>
		              <div class="pull-right">
		              		<a href="{{ route('order_history.download') }}" class="btn  btn-success btn-flat btn-sm" title="Tambah" ><span class="glyphicon glyphicon-download"></span></a>
		              </div>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
					<div class="panel-body text-center">
                    	{{-- <notifications-demo></notifications-demo> --}}
                	</div>
		              <table id="order_history" class="table table-bordered table-striped">
		                <thead>
			                <tr>
			                  <th>NIP</th>
			                  <th>Nama</th>
			                  <th>No WA</th>
			                  <th>Provinsi</th>
			                  <th>Kota/Kabupaten</th>
			                  <th>Alamat Detail</th>
			                  <th>Email</th>
			                  <th></th>
			                </tr>
		                </thead>
		              </table>
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
    $(function () {
        $('#order_history').DataTable({
            serverSide: true,
            processing: true,
            ajax: '{{ route('order_history.data') }}',
            columns: [
                {data: 'nip'},
                {data: 'nama'},
                {data: 'no_wa'},
                {data: 'province_id'},
                {data: 'city_id'},
                {data: 'alamat'},
                {data: 'email'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endsection