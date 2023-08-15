<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\TanggalHelper;

class Pengajuan extends Model
{
    use HasFactory;
    
    protected $guarded = [];  
    protected $table = 'pengajuan';

    public function users(){

        return $this->belongsTo(User::class,'users_id');
    }

    public function getUpdatedAtAttribute($value){
        
        return TanggalHelper::formatTanggalIndo($value);
    }
}
