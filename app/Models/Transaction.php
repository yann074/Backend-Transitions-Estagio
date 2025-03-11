<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $fillable = [
        "date_criated",
        "type",
        "value",
        "categoria",
        "descricao"
    ];
}
