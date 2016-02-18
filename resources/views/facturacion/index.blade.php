@extends('layouts.app')

@section('content')
<div class="page-content row">
  <!-- Begin Header & Breadcrumb -->
  <div class="content-header">
    <div class="row">
      <div class="col-sm-6">
        <div class="header-section">Facturacion</div>
      </div>
      <div class="col-sm-6 hidden-xs">
        <div class="header-section">
          <ul class="breadcrumb breadcrumb-top">

            <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
            <li><a href="{{ URL::to('paciente/'.$data_paciente->id) }}">Facturas</a></li>
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
                    <h2>Factura <small>{{ $row_compania->prefijo }}-{{ $row_data_factura->codigo }}-{{ $row_compania->sufijo }}</small></h2>
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
                            <strong>{{ $data_paciente->tipoDocumento }}</strong> {{ $data_paciente->numDoc }}<br>
                            <address>
                                <strong>Direcci&oacute;n </strong> {{ $data_paciente->direccion or '' }}<br>
                                <strong>Ciudad</strong> {{ $data_paciente->direccion or '' }}<br>
                                <strong>Telefono</strong> {{ $data_paciente->telefono }} <i class="fa fa-phone"></i><br>
                                <strong>Celular</strong> {{ $data_paciente->celular1 }} <i class="fa fa-mobile-phone"></i>
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
                                <th style="width: 30%;">Producto / Servico</th>
                                <th class="text-center" style="width: 10%;">Cantidad</th>
                                <th class="text-right">Valor</th>
                                <th class="text-right">Descuento</th>
                                <th class="text-right total-per-item">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items_quote as $item)
                              <tr class="contField">
                                  <td class="text-center"></td>
                                  <td>
                                  {{ $item->nombre }}
                                  </td>
                                  <td class="text-right quantity-box"><span class="label label-success"><strong>x {{ $item->quantity }}</strong></span></td>
                                  <td class="text-right">$ {{ $item->unit }}</td>
                                  <td class="text-right">$ {{ $item->descuento }}</td>
                                  <td class="text-right amount">$ {{ ($item->quantity * $item->unit) - $item->descuento }}</td>
                              </tr>
                              @endforeach

                                <tr class="subtotal">
                                    <td colspan="5" class="text-right"><span class="h4">Subtotal</span></td>
                                    <td class="text-right"><span class="h4 subtotal_final">$ {{ $values->subtotal }}</span></td>
                                </tr>
                                <tr >
                                    <td colspan="5" class="text-right"><span class="h4">Descuento</span></td>
                                    <td class="text-right"><span class="h4 descuento_final">$ {{ $values->descuento }}</span></td>
                                </tr>
                                <tr class="totalfinal">
                                    <td colspan="5" class="text-right"><span class="h4"><strong>Total</strong></span></td>
                                    <td class="text-right"><span class="h4"><strong class="total_final">$ {{ $values->total_end }}</strong></span></td>
                                </tr>
                        </tbody>
                    </table>

                </div>

                <!-- END Table -->
                <div class="resolucion">
                  <h3>Resoluci&oacute;n</h3>
                  {{ $row_compania->resolucion }}
                </div>

                <!-- Message -->
                <div class="alert text-center observations">
                    <h3>Observaciones</h3>

                    <div class="descripcion-factura">
                      {{$data_paciente->observation}}
                    </div>

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
