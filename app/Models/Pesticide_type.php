<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesticide_type extends Model
{
    use HasFactory;
    protected $table = 'pesticide_types'; // Specify the actual table name if different

    protected $fillable = [
        'pesticide_id',
        'type_id',
        // Add any additional columns if needed
    ];
    public function pesticide()
    {
        return $this->belongsTo(Pesticide::class, 'pesticide_id');
    }
    public function type()
{
    return $this->belongsTo(Type::class, 'type_id');
}
}
