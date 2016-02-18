@extends('layouts.app') @section('content')

<div class="content-header">
	<div class="row">
		<div class="col-sm-6">
			<div class="header-section">Compa&ntilde;&iacute;as</div>
		</div>
		<div class="col-sm-6 hidden-xs">
			<div class="header-section">
				<ul class="breadcrumb breadcrumb-top">
					<li><a href="{{ URL::to('lreservas') }}"><i class="fa fa-home"></i></a></li>
					<li><a href="{{ URL::to('pacientes') }}">Pacientes</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="row">
  <button class="btn btn-info btn-crear-compania">
    <a href="../compania/update" class="btn-crear">Crear Compañía.<i class="fa fa-plus-circle"></i></a>
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
            <a name="editar" class="btn btn-default" href="" title="Editar"><i class="fa fa-pencil-square-o"></i></a>
            <a name="print" class="btn btn-success" href="" title="Ver"><i class="fa fa-eye"></i></a>
            <a name="delete" class="btn btn-danger" href="" title="Eliminar"><i class="fa fa-minus-circle"></i></span>
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


</script>
@stop
