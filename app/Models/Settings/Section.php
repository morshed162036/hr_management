<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Settings\Department;
class Section extends Model
{
    use HasFactory;

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }
}
