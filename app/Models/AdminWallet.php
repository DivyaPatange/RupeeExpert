<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminWallet extends Model
{
    use HasFactory;
    protected $table = "admin_wallets";

    protected $fillable = ['dailyreport_id', 'client_id', 'amount', 'income_date'];
}
