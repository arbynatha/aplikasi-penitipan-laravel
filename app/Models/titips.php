<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class titips extends Model
{
    protected $table = 'titips';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
