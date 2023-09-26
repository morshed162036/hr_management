<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Settings\Grade;
use App\Models\User;
class Increment extends Model
{
    use HasFactory;

    public function employee(){
        return $this->belongsTo(User::class,'user_id')->with('info');
    }
    public function previous(){
        return $this->belongsTo(Grade::class,'previous_grade');
    }
    public function next(){
        return $this->belongsTo(Grade::class,'current_grade');
    }
    public function approved(){
        return $this->belongsTo(User::class,'approved_by')->with('info');
    }
}
