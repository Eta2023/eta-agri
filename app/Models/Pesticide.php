<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesticide extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'license_number',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function types()
{
    return $this->belongsToMany(Type::class, 'pesticide_types');
}
}
