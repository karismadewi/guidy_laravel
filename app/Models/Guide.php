<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'status',
        'best_review',
        'profile',
    ];
    
    public function ticket(){
        return $this->hasMany(Ticket::class,'idGuide','id');
    }

}
