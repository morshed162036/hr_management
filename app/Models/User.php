<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Employee\Employee_information;
use App\Models\Employee\Employee_personal_information;
use App\Models\Employee\Employee_bank_information;
use App\Models\Employee\Employee_education_information;
use App\Models\Employee\Employee_emergency_contact;
use App\Models\Employee\Employee_experience_information;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function info(){
        return $this->hasOne(Employee_information::class,'user_id')->with('wing','branch','department','section','designation','grade');
    }
    public function personalinfo(){
        return $this->hasOne(Employee_personal_information::class,'user_id');
    }
    public function educationinfo(){
        return $this->hasMany(Employee_education_information::class,'user_id');
    }
    public function bankinfo(){
        return $this->hasMany(Employee_bank_information::class,'user_id');
    }
    public function experienceinfo(){
        return $this->hasMany(Employee_experience_information::class,'user_id');
    }
    public function emergencycontact(){
        return $this->hasMany(Employee_emergency_contact::class,'user_id');
    }
}
