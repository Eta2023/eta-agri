<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classeta extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEng',
        'phylums_id',
        'note',
   
    ];
    public function phylums()
    {
        return $this->belongsTo(Phylum::class, 'phylums_id');
    }
}
