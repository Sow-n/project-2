<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListAdminModel extends Model
{
    use HasFactory;

    protected $table = 'listAdmin';

    public $primaryKey = 'id';

    public function getGenderNameAttribute()
    {
        if ($this->gender == 0) {
            return 'Nữ';
        } else {
            return 'Nam';
        }
    }
}
