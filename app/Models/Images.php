<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Parts;
class Images extends Model
{
 use HasFactory;
 public function parts()
 { // FK relationship
 return $this->belongsTo(Parts::class);
 }
}

