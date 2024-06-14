<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayats extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function titips()
    {
        return $this->belongsTo(titips::class, 'titips_id');
    }
}
