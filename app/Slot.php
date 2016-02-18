<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $table = 'booking_slots';
    protected $primaryKey = 'slot_id';
    public $timestamps = false;
    protected $fillable = [
        'slot_date',
        'slot_time_from',
        'slot_time_to',
        'calendar_id',
        'idEstadoVisita'
    ];

    ######################### RELATIONS ##########################
    public function reservacion()
    {
        return $this->belongsTo('App\Reservacion', 'slot_id', 'slot_id');
    }

    #################### GETTERS AND SETTERS #####################
    # id
    public function getIdAttribute()
    {
        return $this->slot_id;
    }

    # start
    public function getStartAttribute()
    {
        return $this->slot_date .' '. $this->slot_time_from;
    }

    # end
    public function getEndAttribute()
    {
        return $this->slot_date .' '. $this->slot_time_to;
    }

    ########################### SCOPES ###########################

}

