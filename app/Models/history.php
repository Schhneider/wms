<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    protected $table = 'history';
    use HasFactory;
    protected $fillable = ['part_nr', 'location','quantity','po_number','commentary'];
}