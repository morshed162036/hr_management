<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hr\Loan;
use App\Models\User;
class Loan_application extends Model
{
    use HasFactory;

    public function employee(){
        return $this->belongsTo(User::class,'user_id')->with('info');
    }
    public function approved(){
        return $this->belongsTo(User::class,'approved_by')->with('info');
    }
    public function loan(){
        return $this->belongsTo(Loan::class,'loan_id');
    }

}
