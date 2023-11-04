<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempImages extends Model
{
    use HasFactory;

    protected $primaryKey = 'I_id';
    protected $table = '_temp_images';
}
