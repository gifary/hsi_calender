@if($bukti_trf!=null)
	<a href="{{ route('order_history.download_bukti_trf',$bukti_trf) }}" class="btn  btn-primary btn-flat btn-sm" title="Download bukti transfer" ><span class="glyphicon glyphicon-download-alt"></span></a>
@else
	NA
@endif
