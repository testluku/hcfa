@extends('layouts.app')
@section('content')
<div class="content-header">
	<div class="row">
		<div class="col-sm-6">
			<div class="header-section">Agendamiento de Citas</div>
		</div>
		<div class="col-sm-6 hidden-xs">
			<div class="header-section">
				<ul class="breadcrumb breadcrumb-top">

					<li><a href="{{ URL::to('lreservas') }}"><i class="fa fa-home"></i></a></li>
					<li><a href="">Citas</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
	
	<iframe id="form-iframe" src="{{ URL::to('citas') }}" style="margin:0; width:100%; height:150px; border:none; overflow:hidden;" scrolling="no" onload="AdjustIframeHeightOnLoad()"></iframe>

	<script type="text/javascript">
	function AdjustIframeHeightOnLoad() { document.getElementById("form-iframe").style.height = document.getElementById("form-iframe").contentWindow.document.body.scrollHeight + "px"; }
	function AdjustIframeHeight(i) { document.getElementById("form-iframe").style.height = parseInt(i) + "px"; }
	</script>
	

	
@stop