<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_masterdata extends Model
{
    use HasFactory;
    protected $table = 'tbl_masterdata';
    protected $fillable = [
    'masterdata_name',
    'masterdata_value',
    'masterdata_details',
    ];
}
