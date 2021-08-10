<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListBillModel extends Model
{
    use HasFactory;

    protected $table = 'listBill';

    public $primaryKey = 'id';
}
