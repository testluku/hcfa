@extends('layouts.app') @section('content')

<div class="content-header">
	<div class="row">
		<div class="col-sm-6">
			<div class="header-section">{{ $title }}</div>
		</div>
		<div class="col-sm-6 hidden-xs">
			<div class="header-section">
				<ul class="breadcrumb breadcrumb-top">
					<li><a href="{{ URL::to('lreservas') }}"><i class="fa fa-home"></i></a></li>
					<li><a href="{{ URL::to('compania') }}">Compa&ntilde;&iacute;as</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="row">
  <button class="btn btn-info btn-crear-compania">
    <a href="compania/update" class="btn-crear">Crear Compañía.<i class="fa fa-plus-circle"></i></a>
  </button>
  <div class="table-compania">
    <table class="table">
      <thead>
        <tr>
          <th>
            Nombre
          </th>
          <th>
            NIT
          </th>
          <th style="width: 17%;">
            Ciudad
          </th>
          <th style="width: 17%;">
            Telefono
          </th>
          <th style="width:20%;">
            Acciones
          </th>
        </tr>
      </thead>
      <tbody>

        @foreach($data as $key => $itemCompania)

        <tr class="item-compania">
          <td>{{$itemCompania->nombre}}</td>
          <td>{{$itemCompania->numeroIdentificacion}}</td>
          <td>{{$itemCompania->ciudad}}</td>
          <td>{{$itemCompania->telefonoFijo}}</td>
          <td>
            <a name="editar" class="btn btn-default" href="./compania/update/{{$itemCompania->id}}" title="Editar"><i class="fa fa-pencil-square-o"></i></a>
            <a name="print" class="btn btn-success" href="./compania/details/{{$itemCompania->id}}" title="Ver"><i class="fa fa-eye"></i></a>
            <div name="delete" class="btn btn-danger compania" data-id="{{$itemCompania->id}}" title="Eliminar"><i class="fa fa-minus-circle"></i></div>
          </td>
        </tr>

        @endforeach

      </tbody>
    </table>
  </div>
</div>
<div class="row">
		<!-- Pie Charts Widgets -->

	<!-- END Pie Charts Widgets -->
</div>
<script type="text/javascript">


	$('.compania').confirm({
		    text: "¿Está seguro de querer eliminar &eacute;sta compa&ntilde;&iacute;a?",
		    title: "Confirmación requerida",
		    confirm: function(button) {
					console.log($(button).attr('data-id'));
					$.ajax({
						url: './compania/delete',
						type: 'POST',
						data: {id:$(button).attr('data-id')}
					}).done(function(data){
							console.log(data);
							window.location.href = '/hcfa/public/compania';
					}).fail(function(error){
							console.log(error)
					});

		    },
		    cancel: function(button) {
						console.log('cancelado')
		    },
		    confirmButton: "Si, estoy seguro.",
		    cancelButton: "No, cancelar.",
				post: true,
		    confirmButtonClass: "btn-warning",
		    cancelButtonClass: "btn-default",
		    dialogClass: "modal-dialog"
		});

</script>
@stop
