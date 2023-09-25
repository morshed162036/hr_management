<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Settings\Designation;
use App\Models\User;
class Promotion extends Model
{
    use HasFactory;

    public function previous(){
        return $this->belongsTo(Designation::class,'previous_designation');
    }
    public function next(){
        return $this->belongsTo(Designation::class,'current_designation');
    }
    public function approved(){
        return $this->belongsTo(User::class,'approved_by')->with('info');
    }
}
