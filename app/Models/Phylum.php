<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phylum extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEng',
        'note',
        'kingdom_id',
    ];
    public function kingdom()
    {
        return $this->belongsTo(Kingdom::class,'kingdom_id');
    }
}
