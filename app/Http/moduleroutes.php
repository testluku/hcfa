<?php
        Route::controller('historiaclinicapreliminar', 'HistoriaclinicapreliminarController');
        Route::controller('procedimiento', 'ProcedimientoController');
        Route::controller('inventario', 'InventarioController');
        Route::controller('productoservicio', 'ProductoservicioController');
        Route::controller('historiaclinicadefinitiva', 'HistoriaclinicadefinitivaController');
        Route::controller('tasks', 'TasksController');
        Route::controller('lreservas', 'LreservasController');
        Route::controller('rcitas', 'RcitasController');
        Route::controller('datospaciente', 'DatospacienteController');
        Route::controller('datosadicionalesp', 'DatosadicionalespController');
        Route::controller('pacientes', 'PacientesController');
        Route::controller('contrato', 'ContratoController');
        Route::controller('paciente/{id}', 'PacienteController');


        Route::controller('facturacion', 'FacturacionController');

        Route::controller('cotizacion', 'CotizacionController');

        Route::controller('compania','CompaniaController');

        Route::controller('respuestaspaciente','RespuestasPacienteController');

?>
