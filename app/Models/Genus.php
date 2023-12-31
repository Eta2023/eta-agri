<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genus extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEng',
        'family_id',
        'note',
   
    ];
    public function families()
    {
        return $this->belongsTo(Family::class, 'family_id');
    }
}
