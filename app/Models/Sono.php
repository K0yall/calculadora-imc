<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sono extends Model
{
    use HasFactory;
    protected $fillable = ['horas_sono', 'avaliacao'];
}
