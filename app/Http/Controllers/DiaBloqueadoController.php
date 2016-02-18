<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DiaBloqueado;

class DiaBloqueadoController extends Controller
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
    public function index()
    {
        $bloqueados = DiaBloqueado::where('Grupo', '=', $this->grupo)
                                     ->orderBy('desde')
                                     ->get();
        return response()->json(['bloqueados' => $bloqueados]);
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
        $bloqueo = new DiaBloqueado;
        $bloqueo->Grupo = $this->grupo;
        $bloqueo->desde = $request->input('desde');
        $bloqueo->hasta = $request->input('hasta');
        $bloqueo->save();
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
        DiaBloqueado::destroy($id);
        return response()->json(['success' => true]);
    }

    /**
     * Retorna los días bloqueados como eventos de tipo "background".
     *
     * @return Array
     */
    public function blockedDays(Request $request)
    {
        $bloqueos = DiaBloqueado::where('Grupo', '=', $this->grupo)
                                ->get();
        # Dias bloqueados, serán los eventos que se retornarán.
        $db = [];
        foreach ($bloqueos as $bloqueo) {
            $db[] = [
                'id' => 'unavailable-for-reservation',
                'className' => 'unavailable-for-reservation',
                'color' => '#444',
                'start' => $bloqueo->desde, # start time
                'end' => $bloqueo->hasta, # end time
                'overlap' => false,
                'rendering' => 'background',
            ];
        }
        return $db;
    }
}
