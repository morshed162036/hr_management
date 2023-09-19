<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Settings\Wing;
class Branch_office extends Model
{
    use HasFactory;

    public function wings(){
        return $this->belongsTo(Wing::class,'wing_id');
    }
}
