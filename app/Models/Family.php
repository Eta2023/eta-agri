<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEng',
        'note',
        'ranks_id',
    ];
    public function rank()
    {
        return $this->belongsTo(Rank::class, 'ranks_id');
    }
    
}
