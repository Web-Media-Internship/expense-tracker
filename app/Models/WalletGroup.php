<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletGroup extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }
}
