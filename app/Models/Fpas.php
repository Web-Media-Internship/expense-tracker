<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fpas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'code',
        'expired_at'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
