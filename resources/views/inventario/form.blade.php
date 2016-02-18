
@if($setting['form-method'] =='native')
	<div class="sbox">
		<div class="sbox-title">  
			<h4> <i class="fa fa-table"></i> <?php echo $pageTitle ;?> <small>{{ $pageNote }}</small>
				<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-danger" onclick="ajaxViewClose('#{{ $pageModule }}')"><i class="fa fa fa-times"></i></a>
			</h4>
	</div>

	<div class="sbox-content"> 
@endif	
			{!! Form::open(array('url'=>'inventario/save/'.SiteHelpers::encryptID($row['idInventario']), 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'inventarioFormAjax')) !!}
			<div class="col-md-12">
						<fieldset><legend> Inventario</legend>
									
				  <div class="form-group hidethis " style="display:none;"> 
					<label for="IdInventario" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('IdInventario', (isset($fields['idInventario']['language'])? $fields['idInventario']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('idInventario', $row['idInventario'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Código del producto" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Código del producto', (isset($fields['codigoProducto']['language'])? $fields['codigoProducto']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('codigoProducto', $row['codigoProducto'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
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
				  </div> 					
				  <div class="form-group hidethis " style="display:none;"> 
					<label for="FechaModificacion" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('FechaModificacion', (isset($fields['fechaModificacion']['language'])? $fields['fechaModificacion']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('fechaModificacion', $row['fechaModificacion'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
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
	var form = $('#inventarioFormAjax'); 
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