<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cita;
use DB;
use Log;
use Carbon\Carbon;

class CitaController extends Controller
{

    /**
     * Retorna todas las citas en el rango
     * pasado en los parámetros.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return response()->json(Cita::notAllDay()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Crea una nueva cita.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');
        # Verifica que la hora en la que se está creando la cita
        # no se cruce con otra cita existente.
        $overlap = $this->checkOverlap(null, $start, $end);
        $ret = ['success' => false];
        if (!$overlap) {
            $cita_id = Cita::create($request->input())->id;
            if ($cita_id) {
                $ret['success'] = true;
            } else {
                $ret['message'] = 'Por favor intenta de nuevo.';
            }
        } else {
            $ret['message'] = 'Ya existe otra cita en esa fecha.';
        }
        return response()->json($ret);
    }

    /**
     * Retorna la información de la cita solicitada.
     *
     * @param  Request $request
     * @return Response
     */
    public function show(Request $request)
    {
        return Cita::find($request->input('id'));
    }

    /**
     * Muestra el formulario para editar la cita.
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->input('id');
        $cita = Cita::find($id);
        if (!is_object($cita)) {
            $cita = new Cita;
            $cita->hora_inicio = Carbon::now();
            $cita->hora_fin = Carbon::now();
        }
        return view('edit', ['cita' => $cita]);
    }

    /**
     * Modifica la cita
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        $cita_id = $request->input('id');
        $cita = Cita::find($cita_id);
        if (!$cita) {
            // La cita no existe, entonces pasamos la información al
            // método store para que se encargue de crear una nueva.
            return $this->store($request);
        }
        $start = $request->input('start');
        $end = $request->input('end');
        # Verifica que la hora a la que se está moviendo la cita
        # no se cruce con otra cita existente.
        $overlap = $this->checkOverlap($cita_id, $start, $end);
        $ret = ['success' => false];
        if (!$overlap)
        {
            if ($cita->update($request->input())) {
                $ret['success'] = true;
            } else {
                $ret['message'] = 'Por favor intenta de nuevo.';
            }
        } else {
            $ret['message'] = 'Ya existe otra cita en esa fecha.';
        }
        return response()->json($ret);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $ret = false;
        if (Cita::destroy($id)) { $ret = ""; }
        return response()->json($ret);
    }

    /**
     * Verifica si hay algún evento repetitivo con el mismo id.
     *
     * @param Request $request
     * @return Response
     */
    public function checkRepetitiveEvents(Request $request)
    {
        $id = $request->input('id');
        $total =  Cita::repetitiveEvents($id)->count();
        $ret = false;
        if ($total > 1) { $ret = true; }
        else if ($total == 1) {
             $cita = Cita::repetitiveEvents($id)->first();
             if ($cita->id == $cita->repeat_id) { $ret = false; }
             else { $ret = true; }
        } else { $ret = false; }
        return response()->json($ret);
    }

    /**
     * Verifica si las fechas de inicio y fin pasadas como parámetro
     * se cruzan o no con otras citas existentes.
     *
     * @param int $cita_id Sólo para evitar comprobar con la misma cita
     * @param DateTime $start Inicio de la cita
     * @param DateTime $end Fin de la cita
     * @return boolean
     */
    public function checkOverlap($cita_id, $start, $end)
    {
        $start = new Carbon($start);
        $end = new Carbon($end);
        $cstart = $start->timestamp + 1;
        $cend = $end->timestamp - 1;
        $citas = Cita::where('start', '>=', $start->toDateString())
                     ->where('end', '<=', $end->addDay()->toDateString())
                     ->get();
        foreach ($citas as $c)
        {
            // Verifica si es una cita existente (tiene id), sino verifica que
            // sea una cita diferente a la que deseamos modificar.
            if ($cita_id && $c->id == $cita_id) {
                continue;
            }
            $estart = (new Carbon($c->start))->timestamp;
            $eend = (new Carbon($c->end))->timestamp;
            if (( $cstart > $estart && $cstart < $eend ) ||
                ( $cend > $estart && $cend < $eend ) ||
                ( $cstart < $estart && $cend > $eend ))
            {
                return true;
            }
        }
        return false;
    }
}

