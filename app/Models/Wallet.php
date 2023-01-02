<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function walletgroup()
    {
        return $this->belongsTo(WalletGroup::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
