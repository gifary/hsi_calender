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
		              <table id="lokasi" class="table table-bordered table-striped">
		                <thead>
			                <tr>
			                  <th>Kode</th>
			                  <th>Lokasi</th>
			                  <th>Aksi</th>
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
        $('#lokasi').DataTable({
            serverSide: true,
            processing: true,
            ajax: '{{ route('lokasi.data') }}',
            columns: [
                {data: 'kode'},
                {data: 'nama'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endsection