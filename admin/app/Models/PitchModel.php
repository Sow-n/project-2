<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PitchModel extends Model
{
    use HasFactory;
    protected $table = 'pitch';

    public $primaryKey = 'id';
}
