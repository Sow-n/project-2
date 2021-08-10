<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaModel extends Model
{
    use HasFactory;

    protected $table = 'area';

    // protected $fillable = ['area_name', 'area_address', 'del_flag', 'image_path'];

    public $primaryKey = 'id';
}
