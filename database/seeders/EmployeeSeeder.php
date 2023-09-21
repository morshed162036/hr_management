<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee\Employee_personal_information;
use App\Models\Employee\Employee_bank_information;
use App\Models\Employee\Employee_education_information;
use App\Models\Employee\Employee_emergency_contact;
use App\Models\Employee\Employee_experience_information;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $personal = [
            ['id'=>'1','user_id'=>'1','date_of_birth'=>'2000-09-05','nationality'=>'Bangladeshi','religion'=>'Muslim','blood_group'=>'A+','marital_status'=>'Single','employment_of_spouse'=>'No']
        ];
        $bank = [
            ['id'=>'1','user_id'=>'1','Bank_name'=>'one bank','branch'=>'mirpur','account_name'=>'supar admin','account_no'=>'123456'],
            ['id'=>'2','user_id'=>'1','Bank_name'=>'city','branch'=>'mirpur','account_name'=>'super admin','account_no'=>'789123']
        ];
        $education = [
            ['id'=>'1','user_id'=>'1','institution'=>'abc','degree'=>'abc','starting_date'=>'2005-04-01','complete_date'=>'2010-05-01','result'=>'3.50'],
            ['id'=>'2','user_id'=>'1','institution'=>'def','degree'=>'def','starting_date'=>'2010-04-01','complete_date'=>'2015-05-01','result'=>'4.00']
        ];
        $experience = [
            ['id'=>'1','user_id'=>'1','company_name'=>'xyz','position'=>'MD','period_form'=>'2016-04-01','period_to'=>'2020-04-01']
        ];

        $contact = [
            ['id'=>'1','user_id'=>'1','contact_type'=>'Primary','name'=>'Mr.kashem','relation'=>'Brother','phone'=>'123xxxxxx','alt_phone'=>''],
            ['id'=>'2','user_id'=>'1','contact_type'=>'Secondary','name'=>'Mr.kalam','relation'=>'Brother','phone'=>'456xxxxxx','alt_phone'=>'789xxxxx'],
        ];

        Employee_personal_information::insert($personal);
        Employee_bank_information::insert($bank);
        Employee_education_information::insert($education);
        Employee_emergency_contact::insert($contact);
        Employee_experience_information::insert($experience);
    }
}
