@extends('layouts.app')

@section('content')
<script type="text/javascript">

  var nextinput = {{ $row_ci_count }};

  $('.remove').live('click',function () {
    $(this).parents('.d').remove();
  })

  function add(){
    nextinput++;
    campo = '<tr class="d contField" data-idd="'+nextinput+'"><td class="text-center"></td><td><strong><label for="">Producto: </label></strong><div class="input_container"><input class = "valueProduct" name="item['+nextinput+'][idProducto]" type="hidden" ><input type="text" name="item['+nextinput+'][productoservicio]" value="" class="productClass" autocomplete="off"><ul id="product_list_id" class="product_list_class"></ul></div></td><td class="text-center"><span class="label label-success"><strong>x <input class="quantity" type="number" name="item['+nextinput+'][quantity]" value=""> </strong></span></td><td class="text-right">$ <input class="unit" type="number" name="item['+nextinput+'][unit]" value=""></td><td class="text-right">$ <input class="descuento" type="number" name="item['+nextinput+'][descuento]" value=""></td>  <td class="text-right">$ <span class="amount"></span> </td><td class="remove"><div type="button" name="button" id> - </div></td></tr>';
    $('.newrow').attr('name',nextinput);
    $(".contField:first").before(campo);
  }


  $(document).on('keyup','.productClass',function(){

       var keyword =  $(this).val();
       var self = $(this);

       if (keyword.length > 0) {

         $.ajax({
           url: '../ajaxrefresh',
           type: 'POST',
           data: {keyword:keyword},
           success:function(data){

              console.log( data  );


              if(data.length > 0){

                var resul = '';

                data.forEach(function(element, index, array){

                  console.log(element);
                  resul += '<li class="lilist" data-value="'+element['nombre']+'" data-id="'+element['id']+'" data-precio="'+element['precio']+'">'+element['nombre']+'</li>';
                })

                self.siblings('.product_list_class').show();
                self.siblings('.product_list_class').html(resul);

              }else {
                self.siblings('.product_list_class').html('');
                self.siblings('.product_list_class').hide();

              }


           }
         });
       } else {
         $('#product_list_id').hide();
       }



     });


$('.lilist').live('click',function(){

  var input_text = $(this).parent().siblings('.productClass');
  var value_product = $(this).parent().siblings('.valueProduct');
  var precio = $(this).parents('.contField').find('.unit');
  var cantidad = $(this).parents('.contField').find('.quantity');
  var amount = $(this).parents('.contField').find('.amount');


    // change input value
    input_text.val($(this).attr('data-value'));
    value_product.val($(this).attr('data-id'));
    precio.val($(this).attr('data-precio'));
    cantidad.val(1);

    amount.html($(this).attr('data-precio') * 1);

    // hide proposition list
    $(this).parent().hide();

});

$(document).on('keyup','.contField',function(){

  var descuento_final = 0;
  var subtotal        = 0;
  var total_final     = 0;


  var q     = $(this).find('.quantity').val();
  var unit  = $(this).find('.unit').val();
  var d     = $(this).find('.descuento').val();


  $(this).find('.amount').html((q * unit) - d);

  $('.descuento').each(function(){
    descuento_final += Number($(this).val());
  });
  $('.descuento_final').html(descuento_final);

  $('.contField').each(function(){
     subtotal += $(this).find('.quantity').val() * $(this).find('.unit').val();
  })

  $('.subtotal_final').html(subtotal);
  $('.total_final').html(new Intl.NumberFormat('es-CO').format(Number($('.subtotal_final').html()) - Number($('.descuento_final').html())));

});



</script>

<div class="page-content row">
  <!-- Begin Header & Breadcrumb -->
    <div class="content-header">
    	<div class="row">
    		<div class="col-sm-6">
    			<div class="header-section">Facturaci&oacute;n</div>
    		</div>
    		<div class="col-sm-6 hidden-xs">
    			<div class="header-section">
    				<ul class="breadcrumb breadcrumb-top">

    					<li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
    					<li><a href="{{ URL::to('pacientes') }}">Pacientes</a></li>
              <li><a href="{{ URL::to('paciente/'.$row_c->idPaciente) }}">Paciente</a></li>
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
          {!! Form::open(array('url'=>'facturacion/updated?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
          <!-- Invoice Block -->
          <div class="block">
              <!-- Invoice Title -->
              <div class="block-title">
                  <!--<div class="block-options pull-right">
                      <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" onclick="App.pagePrint();" style="overflow: hidden; position: relative;"><i class="fa fa-print"></i> Print</a>
                  </div>-->
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
                          {{ $row_p->nombres }} {{ $row_p->apellido1 }} {{ $row_p->apellido2 }}<br>
                          <strong>{{ $row_p->tipoDocumento }}</strong> {{ $row_p->numDoc }}<br>
                          <address>
                              <strong>Direcci&oacute;n</strong> {{ $row_p->direccion }}<br>
                              <strong>Ciudad</strong> {{ $row_p->ciudad or '' }}<br>
                              <strong>Telefono</strong> {{ $row_p->telefono }} <i class="fa fa-phone"></i><br>
                              <strong>Celular</strong> {{ $row_p->celular1 }} <i class="fa fa-mobile-phone"></i>
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
                              <th class="text-center" style="width: 10%;">Cantidad</th>
                              <th class="text-right" style="width: 20%;">Valor</th>
                              <th class="text-right" style="width: 20%;">Descuento</th>
                              <th class="text-right total-per-item">Total</th>
                              <th>
                                -
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                        {!! Form::hidden('id_factura', $id_factura, array('id' => '')) !!}
                        @foreach($row_ci as $key => $item)
                            <tr class="d contField">
                                <td class="text-center"></td>
                                <td>
                                  <div class="input_container">

                                    {!! Form::hidden('idProducto', $item->idProducto, array('id' => 'valueProduct', 'class' => 'valueProduct','name'=> 'item['.$key.'][idProducto]')) !!}
                                    {!! Form::text('', $item->nombre, array('id' => 'productoId', 'class'=>'productClass', 'placeholder'=>'', 'name'=> 'item['.$key.'][productoservicio]', 'autocomplete' => 'off' )) !!}
                                    <ul id="product_list_id" class="product_list_class"></ul>
                                  </div>
                                </td>
                                <td class="text-right quantity-box"><span class="label label-success"><strong>x {!! Form::number('', $item->cantidad ,array('class'=>'quantity', 'placeholder'=>'', 'name'=> 'item['.$key.'][quantity]'  )) !!}</strong></span></td>
                                <td class="text-right">$ {!! Form::number('', $item->valor, array('class'=>'unit', 'placeholder'=>'', 'name'=> 'item['.$key.'][unit]' )) !!}</td>
                                <td class="text-right">$ {!! Form::number('', $item->descuento, array('class'=>'descuento', 'placeholder'=>'', 'name'=> 'item['.$key.'][descuento]', 'autocomplete' => 'off', 'required', 'min'=>'0'  )) !!}</td>

                                <td class="text-right">$ <span class="amount">{{ ($item->valor * $item->cantidad) - $item->descuento }}</span></td>

                                @if( $key != count($row_ci) - 1)
                                    <td class="remove"><div type="button" name="button" id> - </div></td>
                                @endif

                                  {!! Form::hidden('idCotizacion', $item->idCotizacion, array('id' => '')) !!}
                                  {!! Form::hidden('idItem', $item->idItem, array('id' => '', 'name'=> 'item['.$key.'][idItem]')) !!}
                            </tr>
                        @endforeach

                              <tr class="subtotal">
                                  <td colspan="5" class="text-right"><span class="h4">Subtotal</span></td>
                                  <td class="text-right"><span class="h4">$</span><span class="h4 subtotal_final">{{$row_account->subtotal}}</span></td>
                              </tr>
                              <tr >
                                  <td colspan="5" class="text-right"><span class="h4">Descuento</span></td>
                                  <td class="text-right"><span class="h4">$</span><span class="h4 descuento_final">{{$row_account->descuento_total}}</span></td>
                              </tr>
                              <tr class="totalfinal">
                                  <td colspan="5" class="text-right"><span class="h4"><strong>Total</strong></span></td>
                                  <td class="text-right"><span class="h4">$</span><span class="h4"><strong class="total_final">{{ number_format($row_account->subtotal - $row_account->descuento_total) }}</strong></span></td>
                              </tr>
                      </tbody>
                  </table>
                  <div class="form-group">
                  <label class="col-sm-4 text-right">&nbsp;</label>
                  <div class="col-sm-8">
                  <button type="submit" name="submit" class="btn btn-primary btn-sm" id="saveitemsCotizacion"><i class="fa  fa-save "></i> Guardar </button>
                  <div onclick="location.href='{{ URL::to('paciente/'.$row_p->idPaciente) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i> Cancelar </div>
                  </div>
                  </div>
              </div>
              <div class="buttons">
                <button type="button" onclick="add()" name="button" class="btn btn-success btn-addItem"> + </button>
              </div>
              <!-- END Table -->
              <div class="resolucion">
                <h3>Resoluci&oacute;n</h3>
                {{ $row_compania->resolucion }}
              </div>
              <!-- Message -->
              <div class="alert text-center observations">
                  <h3>Observaciones</h3>

                  {!! Form::textarea('observation', $row_c->observation, array('id' => '', 'cols' => '40', 'rows'=>'8')) !!}
              </div>

              <!-- END Message -->
          </div>
          <!-- END Invoice Block -->
          {!! Form::close() !!}
      </div>
    </div>
		<div class="ajaxLoading"></div>
		<div id="{{ $pageModule }}View"></div>
		<div id="{{ $pageModule }}Grid"></div>
	</div>
	<!-- End Content -->
</div>


@endsection
