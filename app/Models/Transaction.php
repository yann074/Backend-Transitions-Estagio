<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $fillable = [
        "type",
        "value",
        "category_id",
        "description"
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
