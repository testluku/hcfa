<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Log;
use DB;

class Cita extends Model
{
    protected $table = 'citas';
    protected $fillable = [
        'title',
        'description',
        'start',
        'end',
        'allDay',
        'color',
        'url',
        'category',
        'repeat_type',
        'repeat_id'
    ];

    ############################# SCOPES ############################
    public function scopeNotAllDay($query)
    {
        return $query->select(DB::raw(
            "id, id AS original_id, title, description, start, end,
             color, url, category, repeat_type, repeat_id"
        ));
    }

    public function scopeRepetitiveEvents($query, $id)
    {
        return $query->where('repeat_id', '!=', $id)
                     ->where('id', '=', $id)
                     ->orWhere('repeat_id', '=', $id);
    }

}

