<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class provinsi extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'provinsi';
    public $incrementing = false; // Disable auto-incrementing for UUIDs

    protected $primaryKey = 'id'; // Specify the primary key field
    protected $fillable = [
        'nama_provinsi',
    ];
}