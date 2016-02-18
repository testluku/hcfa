<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\HorarioAtencion;

class HorarioAtencionController extends Controller
{
    private $grupo;

    public function __construct() {
        
        $useridAr=\DB::table('calendars')
        ->first();
        $this->grupo = $useridAr->userid;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $horarios = HorarioAtencion::where('Grupo', '=', $this->grupo)
                                   ->orderBy('dia')->orderBy('desde')
                                   ->get();
        return response()->json(['horarios' => $horarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $horario = new HorarioAtencion;
        $horario->Grupo = $this->grupo;
        $horario->dia = $request->input('dia');
        $horario->desde = $request->input('desde');
        $horario->hasta = $request->input('hasta');
        $horario->save();
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        HorarioAtencion::destroy($id);
        return response()->json(['success' => true]);
    }

    /**
     * Retorna los horarios de atención como eventos de tipo "background".
     *
     * @return Array
     */
    public function businessHours(Request $request)
    {
        $minTime = $request->input('minTime'); # hora mínima configurada en el calendario
        $maxTime = $request->input('maxTime'); # hora máxima configurada en el calendario
        $horarios = HorarioAtencion::where('Grupo', '=', $this->grupo)
                                   ->get();
        # Business hours, serán los eventos que se retornarán.
        $bs = [];
        # Este arreglo se usará para generar la vista de "todo el día" para
        # los dias que no fueron especificados en los horarios de atención.
        $dias = [0, 1, 2, 3, 4, 5, 6];
        foreach ($horarios as $horario) {
            $bs[] = [
                'id' => 'available-for-reservation',
                'start' => $horario->desde, # start time
                'end' => $horario->hasta, # end time
                'overlap' => true,
                'rendering' => 'background',
                'dow' => [$horario->dia] # days of week, array of zero-based day of week integers (0=sunday)
            ];
            if (($key = array_search($horario->dia, $dias)) !== false) {
                # Elimina este día del arreglo de $dias. Al finalizar el foreach
                # se usan los días restantes y se marcan como disponibles todo
                # el día.
                unset($dias[$key]);
            }
        }
        # Marca los días no especificados como disponibles todo el día.
        $bs[] = [
            'id' => 'available-for-reservation',
            'start' => $minTime, # start time
            'end' => $maxTime, # end time
            'overlap' => true,
            'rendering' => 'background',
            'dow' => array_values($dias) # days of week, array of zero-based day of week integers (0=sunday)
        ];
        return $bs;
    }
}
