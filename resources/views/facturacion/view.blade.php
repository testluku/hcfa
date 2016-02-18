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
							{{ SiteHelpers::activeLang('IdTratamientoPropuesto', (isset($fields['idTratamientoPropuesto']['language'])? $fields['idTratamientoPropuesto']['language'] : array())) }}	
						</td>
						<td>{{ $row->idTratamientoPropuesto }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Precio', (isset($fields['Precio']['language'])? $fields['Precio']['language'] : array())) }}	
						</td>
						<td>{{ $row->Precio }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CotizacionTNQ', (isset($fields['cotizacionTNQ']['language'])? $fields['cotizacionTNQ']['language'] : array())) }}	
						</td>
						<td>{{ $row->cotizacionTNQ }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('IdTratamientosNoQuirurgicos', (isset($fields['idTratamientosNoQuirurgicos']['language'])? $fields['idTratamientosNoQuirurgicos']['language'] : array())) }}	
						</td>
						<td>{{ $row->idTratamientosNoQuirurgicos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CodigoProducto', (isset($fields['codigoProducto']['language'])? $fields['codigoProducto']['language'] : array())) }}	
						</td>
						<td>{{ $row->codigoProducto }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('FechaFactura', (isset($fields['fechaFactura']['language'])? $fields['fechaFactura']['language'] : array())) }}	
						</td>
						<td>{{ $row->fechaFactura }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Descuento', (isset($fields['descuento']['language'])? $fields['descuento']['language'] : array())) }}	
						</td>
						<td>{{ $row->descuento }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('OtrosDescuentos', (isset($fields['otrosDescuentos']['language'])? $fields['otrosDescuentos']['language'] : array())) }}	
						</td>
						<td>{{ $row->otrosDescuentos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Total', (isset($fields['total']['language'])? $fields['total']['language'] : array())) }}	
						</td>
						<td>{{ $row->total }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('DescuentoSobreTotal', (isset($fields['descuentoSobreTotal']['language'])? $fields['descuentoSobreTotal']['language'] : array())) }}	
						</td>
						<td>{{ $row->descuentoSobreTotal }} </td>
						
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