
@if($setting['form-method'] =='native')
	<div class="sbox">
		<div class="sbox-title">  
			<h4> <i class="fa fa-table"></i> <?php echo $pageTitle ;?> <small>{{ $pageNote }}</small>
				<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-danger" onclick="ajaxViewClose('#{{ $pageModule }}')"><i class="fa fa fa-times"></i></a>
			</h4>
	</div>

	<div class="sbox-content"> 
@endif	
			{!! Form::open(array('url'=>'productoservicio/save/'.SiteHelpers::encryptID($row['idProducto_Servicio']), 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'productoservicioFormAjax')) !!}
			<div class="col-md-12">
						<fieldset><legend> Producto Servicio</legend>
									
				  <div class="form-group hidethis " style="display:none;"> 
					<label for="IdProducto Servicio" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('IdProducto Servicio', (isset($fields['idProducto_Servicio']['language'])? $fields['idProducto_Servicio']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('idProducto_Servicio', $row['idProducto_Servicio'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Código" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Código', (isset($fields['codigo']['language'])? $fields['codigo']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('codigo', $row['codigo'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Tipo" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Tipo', (isset($fields['tipo']['language'])? $fields['tipo']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('tipo', $row['tipo'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Nombre" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Nombre', (isset($fields['nombre']['language'])? $fields['nombre']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('nombre', $row['nombre'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Descripción" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Descripción', (isset($fields['descripcion']['language'])? $fields['descripcion']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('descripcion', $row['descripcion'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Precio" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Precio', (isset($fields['precio']['language'])? $fields['precio']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('precio', $row['precio'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Costo" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Costo', (isset($fields['costo']['language'])? $fields['costo']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('costo', $row['costo'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Cantidad" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Cantidad', (isset($fields['cantidad']['language'])? $fields['cantidad']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('cantidad', $row['cantidad'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group hidethis " style="display:none;"> 
					<label for="FechaCreacion" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('FechaCreacion', (isset($fields['fechaCreacion']['language'])? $fields['fechaCreacion']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('fechaCreacion', $row['fechaCreacion'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> </fieldset>
			</div>
			
												
								
						
			<div style="clear:both"></div>	
							
			<div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
					<button type="submit" class="btn btn-primary btn-sm "><i class="fa  fa-save "></i>  {{ Lang::get('core.sb_save') }} </button>
					<button type="button" onclick="ajaxViewClose('#{{ $pageModule }}')" class="btn btn-success btn-sm"><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
				</div>			
			</div> 		 
			{!! Form::close() !!}


@if($setting['form-method'] =='native')
	</div>	
</div>	
@endif	

	
</div>	
			 
<script type="text/javascript">
$(document).ready(function() { 
	 
	
	$('.editor').summernote();
	$('.previewImage').fancybox();	
	$('.tips').tooltip();	
	$(".select2").select2({ width:"98%"});	
	$('.date').datepicker({format:'yyyy-mm-dd',autoClose:true})
	$('.datetime').datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'}); 
	$('input[type="checkbox"],input[type="radio"]').iCheck({
		checkboxClass: 'icheckbox_square-green',
		radioClass: 'iradio_square-green',
	});			
	$('.removeCurrentFiles').on('click',function(){
		var removeUrl = $(this).attr('href');
		$.get(removeUrl,function(response){});
		$(this).parent('div').empty();	
		return false;
	});			
	var form = $('#productoservicioFormAjax'); 
	form.parsley();
	form.submit(function(){
		
		if(form.parsley('isValid') == true){			
			var options = { 
				dataType:      'json', 
				beforeSubmit :  showRequest,
				success:       showResponse  
			}  
			$(this).ajaxSubmit(options); 
			return false;
						
		} else {
			return false;
		}		
	
	});

});

function showRequest()
{
	$('.ajaxLoading').show();		
}  
function showResponse(data)  {		
	
	if(data.status == 'success')
	{
		ajaxViewClose('#{{ $pageModule }}');
		ajaxFilter('#{{ $pageModule }}','{{ $pageUrl }}/data');
		notyMessage(data.message);	
		$('#sximo-modal').modal('hide');	
	} else {
		notyMessageError(data.message);	
		$('.ajaxLoading').hide();
		return false;
	}	
}			 

</script>		 