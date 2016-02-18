@if($setting['view-method'] =='native')
<div class="sbox">
	<div class="sbox-title">  
		<h4> <i class="fa fa-table"></i> <?php echo $pageTitle ;?> <small>{{ $pageNote }}</small>
			<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-danger" onclick="ajaxViewClose('#{{ $pageModule }}')">
			<i class="fa fa fa-times"></i></a>
		</h4>
	 </div>

	<div class="sbox-content"> 
@endif	

		<table class="table table-striped table-bordered" >
			<tbody>	
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Código', (isset($fields['codigo']['language'])? $fields['codigo']['language'] : array())) }}	
						</td>
						<td>{{ $row->codigo }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Tipo', (isset($fields['tipo']['language'])? $fields['tipo']['language'] : array())) }}	
						</td>
						<td>{{ $row->tipo }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Nombre', (isset($fields['nombre']['language'])? $fields['nombre']['language'] : array())) }}	
						</td>
						<td>{{ $row->nombre }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Descripción', (isset($fields['descripcion']['language'])? $fields['descripcion']['language'] : array())) }}	
						</td>
						<td>{{ $row->descripcion }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Precio', (isset($fields['precio']['language'])? $fields['precio']['language'] : array())) }}	
						</td>
						<td>{{ $row->precio }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Costo', (isset($fields['costo']['language'])? $fields['costo']['language'] : array())) }}	
						</td>
						<td>{{ $row->costo }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Cantidad', (isset($fields['cantidad']['language'])? $fields['cantidad']['language'] : array())) }}	
						</td>
						<td>{{ $row->cantidad }} </td>
						
					</tr>
				
			</tbody>	
		</table>  
			
		 	

@if($setting['form-method'] =='native')
	</div>	
</div>	
@endif	

<script>
$(document).ready(function(){

});
</script>	