@extends('layouts.app')

@section('content')
<div class="page-content row">
  <!-- Begin Header & Breadcrumb -->
    <div class="content-header">
    	<div class="row">
    		<div class="col-sm-6">
    			<div class="header-section">Cotizacion</div>
    		</div>
    		<div class="col-sm-6 hidden-xs">
    			<div class="header-section">
    				<ul class="breadcrumb breadcrumb-top">

    					<li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
    					<li><a href="{{ URL::to('pacientes') }}">Pacientes</a></li>
              <li><a href="{{ URL::to('paciente').'/'. $data_paciente->id }}">Paciente</a></li>
    				</ul>
    			</div>
    		</div>
    	</div>
    </div>


	<!-- End Header & Breadcrumb -->

	<!-- Begin Content -->
	<div class="page-content-wrapper m-t">
		<div class="resultData">
      <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
          <!-- Invoice Block -->
          <div class="block">
              <!-- Invoice Title -->
              <div class="block-title">
                  <div class="block-options pull-right">
                      <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" onclick="App.pagePrint();" style="overflow: hidden; position: relative;"><i class="fa fa-print"></i> Print</a>
                  </div>

              </div>
              <!-- END Invoice Title -->

              <!-- Invoice Info -->
              <div class="row block-section">
                  <!-- Company Info -->
                  <div class="col-xs-6 col-lg-3">
                      <div class="well">
                          @if($row_compania->logo)

                              <img src="{{ $row_compania->logo }}"
                                alt="avatar"
                                class="logo img-circle img-thumbnail img-thumbnail-avatar pull-left"
                                width="69" height="69">

                          @else

                              <img src="{{ asset('img/placeholders/avatars/avatar9@2x.jpg') }}"
                                alt="avatar"
                                class="logo img-circle img-thumbnail img-thumbnail-avatar pull-left"
                                width="69" height="69">

                          @endif

                          <h3 class="h4"><strong>{{ $row_compania->nombre }}</strong></h3>
                          <strong>NIT</strong> {{ $row_compania->numeroIdentificacion }}
                          <address>
                              <strong>Direccion</strong> {{ $row_compania->direccion }}<br>
                              <strong>Ciudad</strong> {{ $row_compania->ciudad }}<br>
                              <strong>Pa&iacute;s</strong> {{ $row_compania->pais }}<br>
                              <strong>Tel&eacute;fonos <i class="fa fa-phone"></i></strong> {{ $row_compania->telefonoFijo or $row_compania->telefonoMovil }}<br>
                          </address>
                      </div>
                  </div>
                  <!-- END Company Info -->

                  <!-- Client Info -->
                  <div class="col-xs-6 col-lg-3 col-lg-offset-6 text-right">
                      <div class="well">
                          <h3 class="h4"><strong>Paciente</strong></h3>
                          {{ $data_paciente->nombres }} {{ $data_paciente->apellido1 }} {{ $data_paciente->apellido2 }}<br>
                          {{ $data_paciente->tipoDocumento }} {{ $data_paciente->numDoc }}<br>
                          <address>
                              Direcci&oacute;n {{ $data_paciente->direccion }}<br>
                              Ciudad {{ $data_paciente->direccion }}<br>
                              <i class="fa fa-phone"></i> {{ $data_paciente->telefono or $data_paciente->celular1 }}
                          </address>
                      </div>
                  </div>
                  <!-- END Client Info -->
              </div>
              <!-- END Invoice Info -->

              <!-- Table -->
              <div class="table-responsive">
                  <table class="table table-striped table-hover table-bordered table-vcenter">
                      <thead>
                          <tr>
                              <th class="text-center"></th>
                              <th style="width: 30%;">Producto / Servicio</th>
                              <th class="text-center">Cantidad</th>
                              <th class="text-right">Valor</th>
                              <th class="text-right">Descuento</th>
                              <th class="text-right">Total</th>
                          </tr>
                      </thead>
                      <tbody>

                          @foreach ($items as $item)
                            <tr>
                                <td class="text-center">1</td>
                                <td>
                                    <h4><strong>{{ $item->nombre }}</strong></h4>
                                </td>
                                <td class="text-center"><span class="label label-success"><strong>x{{ $item->quantity }}</strong></span></td>
                                <td class="text-right">$ {{ $item->unit }}</td>
                                <td class="text-right">$ {{ $item->descuento }}</td>
                                <td class="text-right">$ {{ $item->amount }}</td>
                            </tr>
                          @endforeach

                          @foreach ($values as $value)
                              <tr>
                                  <td colspan="5" class="text-right"><span class="h4">Subtotal</span></td>
                                  <td class="text-right"><span class="h4">$</span><span class="h4">{{ $value->subtotal }}</span></td>
                              </tr>
                              <tr>
                                  <td colspan="5" class="text-right"><span class="h4">Descuento</span></td>
                                  <td class="text-right"><span class="h4">$</span><span class="h4">{{ $value->descuento }}</span></td>
                              </tr>
                              <tr>
                                  <td colspan="5" class="text-right"><span class="h4"><strong>Total</strong></span></td>
                                  <td class="text-right"><span class="h4">$</span><span class="h4"><strong>{{ number_format($value->total_end,0,'.','.') }}</strong></span></td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
              <!-- END Table -->

              <!-- Message -->
              <div class="alert text-center observations">
                  <h3>Observaciones</h3>

                    <p>{{ $data_paciente->observation }}</p>

              </div>
              <!-- END Message -->
          </div>
          <!-- END Invoice Block -->
      </div>
    </div>
		<div class="ajaxLoading"></div>
		<div id="{{ $pageModule }}View"></div>
		<div id="{{ $pageModule }}Grid"></div>
	</div>
	<!-- End Content -->
</div>
@endsection
