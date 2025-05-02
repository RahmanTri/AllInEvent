<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event'; // Sesuaikan dengan nama tabel di database
    
    protected $fillable = [
        'name_event',
        'jenis_event',
    'name_event',
    'jenis_event',
    'jenis_event',
'tanggal_event',
'lokasi_event',
'rating',
'created_at',
'updated_at'
    ];
    // use HasFactory;
}
