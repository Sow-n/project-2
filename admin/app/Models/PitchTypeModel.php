<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PitchTypeModel extends Model
{
    use HasFactory;
    protected $table = 'pitch_type';

    public $primaryKey = 'id';
}
