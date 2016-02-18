<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Reservacion;
use App\Slot;
use Log;
use DB;
use Carbon\Carbon;
use Mail;

//session_start(); # sesión iniciada en public/index.php por protect("*")
//dd($_SESSION);

class ReservacionController extends Controller
{

    /**
     * Return index view
     *
     * @return view
     */
    public function indexView()
    {
        $especialistas = [];
        $grupo_especialista= $this->getUseridEsp();
        
        //$_SESSION['jigowatt']['user_level'][0];
        # Mantiene en la sesión el último especialista seleccionado
        # para setearlo cuando se recargue el calendario.
        $last_selected_especialista = $grupo_especialista;
        if (isset($_SESSION['last_selected_especialista'])) {
            # Modifica el valor asignado por defecto previamente.
            $last_selected_especialista = $_SESSION['last_selected_especialista'];
        }
        # Cuenta cuantos usuarios con calendario hay en el sistema
        $_SESSION['is_ips'] = $this->checkBelongsToCals();
        
        if ($_SESSION['is_ips']>1) {
            # Si el especialista pertenece a una IPS, carga los demás
            # especialistas de la IPS.
            $especialistas = $this->calendariosEspe();
        }
        return view('welcome', [
            'is_ips' => $_SESSION['is_ips'],
            'especialistas' => $especialistas,
            'grupo_especialista' => $grupo_especialista,
            'last_selected_especialista' => $last_selected_especialista
        ]);
    }
    
    

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $start = new Carbon($request->input('start'));
        $end = new Carbon($request->input('end'));
        $grupo_especialista = $request->input('especialista');
        # Guarda el último especialista seleccionado en la sesión, se usa para
        # seleccionar el especialista (si pertenece a una IPS) en la vista del
        # usuario cuando se recarga la página.
        $_SESSION['last_selected_especialista'] = $grupo_especialista;
        if ($start->diffInDays($end) > 7) {
            # La vista actual es por mes, entonces retorna
            # un conteo de reservaciones por día.
            return $this->eventsCounterByDay($grupo_especialista, $start, $end);
        }
        $reservaciones = Reservacion::reservaciones(
            $start->toDateString(), $end->toDateString()
        )->with(
            # Obtiene los slots de las reservaciones, de esta forma
            # evita hacer un query por cada reservación para pedir la
            # información de su slot y lo realiza en una sola query.
            ['slot' => function($query) use ($start, $end) {
                $query->where('slot_date', '>=', $start->toDateString())
                      ->where('slot_date', '<=', $end->toDateString());
            }]
        );
        if ($grupo_especialista > 0) {
            $reservaciones->byCalendarId($grupo_especialista);
            # Requiere las reservaciones de un especialista en particular.
        } else if ($grupo_especialista == -1) {
            # Requiere todas las reservaciones de todos los especialistas
            # perteneciente a la misma IPS.
            # Obtiene el grupo del especialista logueado.
            $grupo_especialista = 1;
            # IPS del especialista actual para obtener los grupos
            # de los demás especialistas pertenecientes a esta IPS.
            $ips = $this->ipsEspecialista($grupo_especialista);
            # Grupos de los especialistas que pertenecen a la misma IPS
            # del especialista logueado actualmente.
            $grupos = $this->grupoEspecialistasIps($ips);
            $reservaciones->byCalendarIdIn($grupos);
        }
        $reservaciones = $reservaciones->get();
        $eventos = array();
        foreach($reservaciones as $reservacion) {
            $eventos[] = $this->formatReservacion($reservacion);
        }
        return response()->json($eventos);
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
        $start_date = $request->input('start_date');
        $start = $start_date.' '.$request->input('start_time');
        $end = $start_date.' '.$request->input('end_time');
        $overlap = $this->checkOverlap(null, $start, $end);
        if ($overlap['overlap']) {
            # Si entra aquí, significa que esta reserva se cruza
            # con otra reserva existente.
            return response()->json([
                'success' => false,
                'message' => $overlap['message']
            ]);
        }
        $grupo_especialista = $request->input('especialista');
        $slot = new Slot;
        $slot->slot_date = $request->input('start_date');
        $slot->slot_time_from = $request->input('start_time');
        $slot->slot_time_to = $request->input('end_time');
        $slot->calendar_id = $grupo_especialista;
        $slot->slot_reservation = 1;
        $slot->reservation_message = $request->input('reservation_message');
        $slot->idEstadoVisita = 1;
        $slot->save();
        $reservacion = new Reservacion;
        $reservacion->slot_id = $slot->id;
        $reservacion->TipoDocumento = $request->input('TipoDocumento');
        $reservacion->IdPaciente = $request->input('IdPaciente');
        $reservacion->reservation_name = $request->input('reservation_name');
        $reservacion->reservation_surname = $request->input('reservation_surname');
        $reservacion->reservation_email = $request->input('reservation_email');
        $reservacion->reservation_phone = $request->input('reservation_phone');
        $reservacion->TipoConsulta = $request->input('TipoConsulta');
        $reservacion->reservation_message = $request->input('reservation_message');
        $reservacion->calendar_id = $grupo_especialista;
        $reservacion->idEstadoVisita = 1;
        $reservacion->save();
        $this->sendReservationNotification($reservacion->id);
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return Response
     */
    public function show(Request $request)
    {
        $reservacion = Reservacion::find($request->input('id'));
        return response()->json($this->formatReservacion($reservacion));
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
     * @return Response
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $start_date = $request->input('start_date');
        $start = $start_date.' '.$request->input('start_time');
        $end = $start_date.' '.$request->input('end_time');
        $overlap = $this->checkOverlap($id, $start, $end);
        if ($overlap['overlap']) {
            # Si entra aquí, significa que esta reserva se cruza
            # con otra reserva existente.
            return response()->json([
                'success' => false,
                'message' => $overlap['message']
            ]);
        }
        if (!$id) { return $this->store($request); }
        $reservacion = Reservacion::find($id);
        # Save slot information
        $reservacion->slot->slot_date = $request->input('start_date');
        $reservacion->slot->slot_time_from = $request->input('start_time');
        $reservacion->slot->slot_time_to = $request->input('end_time');
        $reservacion->slot->save();
        $reservacion->update($request->input());
        return response()->json(['success' => true]);
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
        if (Reservacion::destroy($id)) { $ret = ""; }
        return response()->json($ret);
    }

    /**
     * Adapta la reservacion para que tenga los
     * campos que espera el plugin fullcalendar.js.
     *
     * @param Reservacion $reservacion
     * @return Array
     */
    public function formatReservacion($reservacion)
    {
        # Reservación no es un objeto, se retorna un objeto sin información
        if (!is_object($reservacion)) {
            return [
                'idPaciente' => '',
                'name' => '',
                'surname' => '',
                'email' => '',
                'phone' => '',
                'description' => ''
            ];
        }
        return [
            'id' => $reservacion->id,
            'original_id' => $reservacion->id,
            //'title' => $reservacion->title,
            'title' => $reservacion->reservation_name,
            'idPaciente' => $reservacion->IdPaciente,
            'name' => $reservacion->reservation_name,
            'surname' => $reservacion->reservation_surname,
            'email' => $reservacion->reservation_email,
            'phone' => $reservacion->reservation_phone,
            'description' => $reservacion->reservation_message,
            'tipoDocumento' => $reservacion->TipoDocumento,
            'tipoConsulta' => $reservacion->TipoConsulta,
            'event_date' => $reservacion->slot->slot_date,
            'start' => $reservacion->slot->start,
            'end' => $reservacion->slot->end,
            'color' => $reservacion->color,
            'url' => 'false',
            'category' => null,
            'repeat_type' => null,
            'repeat_id' => 0
        ];
    }

    /**
     * Verifica si hay algún evento repetitivo con el mismo id.
     *
     * @param Request $request
     * @return Response
     */
    public function checkRepetitiveEvents(Request $request)
    {
        return response()->json(false);
        # Esto nunca se ejecuta >=)
        $id = $request->input('id');
        $total =  Reservacion::repetitiveEvents($id)->count();
        $ret = false;
        if ($total > 1) { $ret = true; }
        else if ($total == 1) {
             $cita = Reservacion::repetitiveEvents($id)->first();
             if ($cita->id == $cita->repeat_id) { $ret = false; }
             else { $ret = true; }
        } else { $ret = false; }
        return response()->json($ret);
    }

    /**
     * Verifica si las fechas de inicio y fin pasadas como parámetro
     * se cruzan o no con otras reservas existentes.
     *
     * @param int $reservacion_id Sólo para evitar comprobar con la misma reservación
     * @param DateTime $start Inicio de la reservación
     * @param DateTime $end Fin de la reservación
     * @return boolean
     */
    public function checkOverlap($reservacion_id, $start, $end)
    {
        $grupo_especialista = 1;
        $start = new Carbon($start);
        $end = new Carbon($end);
        # Agrega uno a la fecha de inicio y resta uno a la fecha de fin
        # para incluir los límites.
        $cstart = $start->timestamp + 1;
        $cend = $end->timestamp - 1;
        $reservaciones = Reservacion::reservaciones(
            $start->toDateString(), $end->toDateString()
        )->with(
            # Obtiene los slots de las reservaciones, de esta forma
            # evita hacer un query por cada reservación para pedir la
            # información de su slot y lo realiza en una sola query.
            ['slot' => function($query) use ($start, $end) {
                $query->where('slot_date', '>=', $start->toDateString())
                      ->where('slot_date', '<=', $end->toDateString());
            }]
        )->byCalendarId($grupo_especialista)
         ->get();
        foreach ($reservaciones as $reservacion)
        {
            if ($reservacion_id && $reservacion->id == $reservacion_id) {
                # Si es la misma reservación que se está modificando
                # (en caso de ser update), entonces pasa a la siguiente.
                continue;
            }
            $estart = (new Carbon($reservacion->slot->start))->timestamp;
            $eend = (new Carbon($reservacion->slot->end))->timestamp;
            if (( $cstart > $estart && $cstart < $eend ) ||
                ( $cend > $estart && $cend < $eend ) ||
                ( $cstart < $estart && $cend > $eend ))
            {
                # Se cruza con al menos una reservación existente.
                return [
                    'overlap' => true,
                    'message' => 'Ya existe otra cita en este rango de tiempo'
                ];
            }
        }
        # No se cruza con ninguna reservación existente.
        return [
            'overlap' => false,
            'message' => 'Go for it!'
        ];
    }

    /**
     * Sugiere al usuario mientras va escribiendo la cédula del paciente.
     *
     * @param Request $request
     * @return Response
     */
    public function autocompleteIdPaciente(Request $request)
    {
        $term = $request->input('term');
        if (!$term) { return response()->json(); }
        $data = \DB::table('DatosBasicosPacientes')
                  ->select(\DB::raw(
                    'numDoc AS label, numDoc AS value '
                  ))
                  ->where('numDoc', 'LIKE', $term .'%')
                  ->orderBy('numDoc')
                  ->take(10)
                  ->get();
        return response()->json($data);
    }

    /**
     * Retorna la información del paciente identificado con
     * el id pasado como parámetro.
     *
     * @param Request $request
     * @return Response
     */
    public function DatosPaciente (Request $request)
    {
        $id_paciente = $request->input('id_paciente');
        if (!$id_paciente) { return response()->json(); }
        $data = \DB::table('DatosBasicosPacientes')
                  ->select(\DB::raw(
                    'tipoDocumento, numDoc, nombres, apellido1, apellido2,
                     telefono, celular1, email, celular2'
                  ))
                  ->where('numDoc', '=', $id_paciente)
                  ->first();
        return response()->json($data);
    }

    /**
     * Retorna un conteo de reservas por día en el rango especificado
     * y por especialista o IPS (si $grupo_especialista = -1).
     *
     * @param int    $grupo
     * @param Carbon $start
     * @param Carbon $end
     * @return Response
     */
    public function eventsCounterByDay($grupo_especialista, Carbon $start, Carbon $end)
    {
        $reservaciones = Reservacion::reservaciones(
            $start->toDateString(), $end->toDateString()
        )->select(\DB::raw(
            'booking_slots.slot_date, COUNT(booking_slots.slot_date) AS count'
        ))->groupBy('booking_slots.slot_date');
        if ($grupo_especialista > 0) {
            # Requiere las reservaciones de un especialista en particular.
            $reservaciones->byCalendarId($grupo_especialista);
        } else if ($grupo_especialista == -1) {
            # Requiere todas las reservaciones de todos los especialistas
            # perteneciente a la misma IPS.
            # Obtiene el grupo del especialista.
            $grupo_especialista = $_SESSION['jigowatt']['user_level'][0];
            # IPS del especialista actual para obtener los grupos
            # de los demás especialistas pertenecientes a esta IPS.
            $ips = $this->ipsEspecialista($grupo_especialista);
            # Grupos de los especialistas que pertenecen a la misma IPS
            # del especialista actual.
            $grupos = $this->grupoEspecialistasIps($ips);
            $reservaciones->byCalendarIdIn($grupos);
        }
        $reservaciones = $reservaciones->get();
        foreach($reservaciones as $reservacion) {
            $reservacion->start = $reservacion->slot_date;
        }
        return response()->json($reservaciones);
    }

    /**
     * Retorna el número de usuarios con agenda de la IPS
     * pertenece a una IPS o no.
     *
     * @param int $grupo_especialista
     * @return int
     */
    public function checkBelongsToCals()
    {
        return \DB::table('calendars')
                 ->count();
    }

    
    
    /**
     * Retorna el primer especialista con agenda.
     *
     * @param int $grupo_especialista
     * @return int
     */
    public function getUseridEsp()
    {
    	$useridAr=\DB::table('calendars')
                 ->first();
		return $useridAr->id; 
    }

    /**
     * Retorna los nombres de especialistas con calendario en la plataforma.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function calendariosEspe()
    {
		return \DB::table('calendars')
                 ->join('tb_users', 'calendars.userid', '=', 'tb_users.id')
                 ->select('tb_users.first_name', 'tb_users.id')
                 ->get();
    }

    /**
     * Retorna el grupo de cada uno de los especialistas de la IPS.
     *
     * @param int $ips
     * @return Array
     */
    public function grupoEspecialistasIps($ips)
    {
        return \DB::table('DatosMedico')
                 ->join('ips_especialista', 'DatosMedico.Grupo', '=', 'ips_especialista.int_ips_especialista')
                 ->where('ips_especialista.int_ips', '=', $ips)
                 ->lists('ips_especialista.int_ips_especialista');
    }

    /**
     * Envía un correo al paciente notificando de la reservación.
     *
     * @param int $reservacion_id
     * @return void
     */
    public function sendReservationNotification ($reservacion_id)
    {
        $reservacion = Reservacion::find($reservacion_id);
        
        #setlocale(LC_TIME, 'es_CO.UTF-8');
        setlocale(LC_TIME, 'es_ES.UTF-8');
        #setlocale(LC_TIME, 'es_MX.UTF-8');
        $slot = $reservacion->slot;
        $event_date = strtotime($slot->slot_date .'T'. $slot->slot_time_from);
        $formatted_date = strftime('%e de %B de %Y', $event_date);
        $time = strftime("%l:%M %p", $event_date);
        $response = [
            'logo' => asset('sximo/images/'.CNF_LOGO),
            'doctor' => 'Dr. Felipe Amaya',
            'paciente' => $reservacion->fullname,
            'lugar' => 'Fundación Santa Fé',
            'fecha' => $formatted_date,
            'hora' => $time,
            'telefono' => '1234',
            'email' => 'info@felipeamaya.com'
        ];
        Mail::send('emails.confirmacion_reserva', $response, function ($message) use ($reservacion) {
            $message->to($reservacion->email, $reservacion->fullname)
                    ->subject('Confirmación de cita');
        });
    }

}

