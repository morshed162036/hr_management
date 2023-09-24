<?php

namespace App\Models\Leave;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Leave\Leave;
class Leave_application extends Model
{
    use HasFactory;

    public function employee(){
        return $this->belongsTo(User::class,'user_id')->with('info');
    }
    public function leaves(){
        return $this->belongsTo(Leave::class,'leave_id');
    }
    public function applied_by(){
        return $this->belongsTo(User::class,'applied_by')->with('info');
    }
    public function approved(){
        return $this->belongsTo(User::class,'approved_by')->with('info');
    }
}
