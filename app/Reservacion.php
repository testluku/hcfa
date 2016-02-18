<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Reservacion extends Model
{
    protected $table = 'booking_reservation';
    protected $primaryKey = 'reservation_id';
    public $timestamps = false;
    protected $fillable = [
        'slot_id',
        'TipoDocumento',
        'IdPaciente',
        'reservation_name',
        'reservation_surname',
        'reservation_email',
        'reservation_phone',
        'TipoConsulta',
        'reservation_message',
        'calendar_id',
        'idEstadoVisita'
    ];

    ######################### RELATIONS ##########################
    public function slot()
    {
        return $this->hasOne('App\Slot', 'slot_id', 'slot_id');
    }

    #################### GETTERS AND SETTERS #####################
    # id
    public function getIdAttribute()
    {
        return $this->reservation_id;
    }

    # fullname
    public function getFullnameAttribute()
    {
        return $this->reservation_name .' '. $this->reservation_surname;
    }

    # email
    public function getEmailAttribute()
    {
        return $this->reservation_email;
    }

    # title
    public function getTitleAttribute()
    {
        return $this->fullname .' - '. $this->TipoDocumento .' '. $this->IdPaciente;
    }

    # color
    public function getColorAttribute()
    {
        $coloresEstadoVisita = [
            '1' => '#6699FF',
            '2' => '#FFCC66',
            '3' => '#66CC66',
            '4' => '#FF6633',
            '5' => '#CC3300',
            '6' => '#DAFF66'
        ];
        $id = $this->idEstadoVisita;
        return isset($coloresEstadoVisita[$id]) ? $coloresEstadoVisita[$id] : '';
    }

    ######################## SCOPES ############################
    public function scopeRepetitiveEvents($query, $id)
    {
        return $query->where('repeat_id', '!=', $id)
                     ->where('id', '=', $id)
                     ->orWhere('repeat_id', '=', $id);
    }

    /**
     * Reservaciones en el rango de tiempo especificado.
     *
     * @param QueryBuilder $query constructor de la query
     * @param string $start inicio del rango (incluído)
     * @param string $end fin del rango (incluído)
     * @return QueryBuilder
     */
    public function scopeReservaciones($query, $start, $end)
    {
        return $query->join('booking_slots', 'booking_slots.slot_id', '=', 'booking_reservation.slot_id')
                     ->where('booking_slots.slot_date', '>=', $start)
                     ->where('booking_slots.slot_date', '<=', $end);
    }

    /**
     * Reservaciones por grupo de especialista.
     *
     * @param QueryBuilder $query constructor de la query
     * @param int $grupo_especialista grupo del especialista
     * @return QueryBuilder
     */
    public function scopeByCalendarId($query, $grupo_especialista)
    {
        return $query->where('booking_slots.calendar_id', '=', $grupo_especialista)
                     ->where('booking_reservation.calendar_id', '=', $grupo_especialista);
    }

    /**
     * Reservaciones por IPS
     *
     * @param QueryBuilder $query constructor de la query
     * @param Array $grupos grupos de los especialistas de la ips
     * @return QueryBuilder
     */
    public function scopeByCalendarIdIn($query, $grupos)
    {
        return $query->whereIn('booking_slots.calendar_id', $grupos)
                     ->whereIn('booking_reservation.calendar_id', $grupos);
    }

}

