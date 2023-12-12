<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'license_number',
        'type_id',
        'manufacture_company',
        'image',
        
    ];
    public function types()
    {
        return $this->belongsTo(Type::class ,'type_id'); // Assuming Classeta is the related model
    
    }}
