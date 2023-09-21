<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Settings\Wing;
use App\Models\Settings\Branch_office;
use App\Models\Settings\Department;
use App\Models\Settings\Section;
use App\Models\Settings\Designation;
use App\Models\Settings\Grade;
class Employee_information extends Model
{
    use HasFactory;

    public function wing(){
        return $this->belongsTo(Wing::class,'wing_id');
    }
    public function branch(){
        return $this->belongsTo(Branch_office::class,'branch_id');
    }
    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }
    public function section(){
        return $this->belongsTo(Section::class,'section_id');
    }
    public function designation(){
        return $this->belongsTo(Designation::class,'designation_id');
    }
    public function grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }
}
