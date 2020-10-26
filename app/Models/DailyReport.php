<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DailyReport extends Model
{
    use HasFactory;

    protected $table = "daily_reports";

    protected $fillable = ['client_id', 'name', 'gross', 'remiser'];

    public static function insertData($data){

        $value=DB::table('daily_reports')->where('client_id', $data['client_id'])->get();
        if($value->count() == 0){
           DB::table('daily_reports')->insert($data);
        }
     }
}
