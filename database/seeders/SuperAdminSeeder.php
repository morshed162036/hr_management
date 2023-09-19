<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\User\Employee_information;
class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = [
            ['id'=>'1','user_name'=>'Super Admin','email'=>'superadmin@gmail.com','password'=>'$2a$12$/Wla/XJzQB7ZdUl/eCCxtOnndvu/8If2xyCTdddOyD1gDhdNN7TyC','status'=>'Active']
        ];
        $info = [
            ['id'=>'1','user_id'=>'1','employee_id'=>'sup-1','first_name'=>'Morshed','last_name'=>'Ahmed','phone'=>'018xxxxxxxx','address'=>'mirpur','state'=>'Dhaka','country'=>'Bangladesh','nid'=>'xxxxxxx','gender'=>'Male','join_date'=>date('Y-m-d'),'employee_type'=>'Master Roll','wing_id'=>'1','brunch_id'=>'1','department_id'=>'1','section_id'=>'1','grade_id'=>'1','designation_id'=>'1','report_to'=>'0','pf&gratuity_eligiblity'=>'No']
        ];

        User::insert($superAdmin);
        //User::find(1)->assignRole('Super Admin');
        Employee_information::insert($info);
    }
}
