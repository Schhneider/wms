<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Images;
class Parts extends Model
{
    use HasFactory;
    protected $fillable = ['part_nr', 'location','quantity','commentary'];
    public function images()
    { // FKrelationship
    return $this->hasMany(Images::class);
    }
}
