<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transition extends Model
{
    protected $fillable = [
        "date_criated",
        "tipe",
        "value",
        "categoria",
        "descricao"
    ];
}
