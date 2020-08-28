<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Log extends Model
{
    protected $table = 'log';
    protected $fillable =['user', 'type_event_id', 'description'];

    public function event()
    {
        return DB::table('type_events')->where('id', $this->type_event_id)->pluck('name')->first();
    }
}
