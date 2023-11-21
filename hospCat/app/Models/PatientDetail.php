<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'PID';
    protected $fillable = ['PatientName', 'PhNo', 'Address'];
}