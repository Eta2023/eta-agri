<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameAr',
        'nameEng',
        'mobile',
        'email',
        'location',
        'logo',
        // 'type_id',
    ];
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
