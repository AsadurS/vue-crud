<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
Str::orderedUuid()->toString();

class Applicant extends Model
{
    protected $guarded = [];

    protected $casts =[
        'created_at' => 'datetime:d M, Y'
];
    public function division()
    {
        return $this->belongsTo(Division::class, "division", "id");
    }

    public function district ()
    {
        return $this->belongsTo(District::class, "district", "id");
    }
    public function upozila()
    {
        return $this->belongsTo(Upozila::class, "upozila", "id");
    }
}
