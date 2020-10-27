<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    use HasFactory;
    protected $table = "user_wallets";

    protected $fillable = ['dailyreport_id', 'client_id', 'parent_id', 'amount', 'income_date'];
}
