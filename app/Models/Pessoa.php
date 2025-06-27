<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pessoa extends Model
{
    protected $table = "pessoa";
    protected $fillable = ["nm_pessoa", "nm_email", "dt_nascimento"];
    public $timestamps = false;

    public function scopeFormatarSaida($query)
    {
        return $query->selectRaw(
            "*, DATE_FORMAT(dt_nascimento,'%d-%m-%Y') as data"
        );
    }
}
