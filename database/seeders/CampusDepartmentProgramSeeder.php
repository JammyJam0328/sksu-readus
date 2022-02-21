<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campus;
class CampusDepartmentProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campus = Campus::create([
            "name" => "Access Campus"
        ]);

        $department = $campus->departments()->create([
            "name" => "College of Teacher Education"
        ]);


        $department->programs()->create([
            "name" => "Bachelor of Physical Education"
        ]);

        $department->programs()->create([
            "name" => "Bachelor in Elementary Education"
        ]);
        $department->programs()->create([
            "name" => "Bachelor in Secondary Education"
        ]);
        $department->programs()->create([
            "name" => "Diploma in Teaching"
        ]);

        $department = $campus->departments()->create([
            "name" => "College of Agriculture"
        ]);


        $department->programs()->create([
            "name" => "Bachelor of Science in Agriculture"
        ]);

        $department->programs()->create([
            "name" => "Bachelor of Science in Agricultural Technology"
        ]);


        $department = $campus->departments()->create([
            "name" => "College of Criminal Justice Education"
        ]);


        $department->programs()->create([
            "name" => "Bachelor of Science in Criminology"
        ]);

        $department->programs()->create([
            "name" => "Bachelor of Science in Industrial Security Management"
        ]);


        $department = $campus->departments()->create([
            "name" => "College of Health Sciences"
        ]);


        $department->programs()->create([
            "name" => "Bachelor of Science in Nursing"
        ]);

        $department->programs()->create([
            "name" => "Bachelor of Science in Midwifery"
        ]);

        $department->programs()->create([
            "name" => "Bachelor of Science in Medical Technology"
        ]);

        $department->programs()->create([
            "name" => "Diploma in Midwifery"
        ]);

        $department = $campus->departments()->create([
            "name" => "College of Law"
        ]);


        $department->programs()->create([
            "name" => "Bachelor of Laws"
        ]);


        $campus = Campus::create([
            "name" => "Isulan Campus"
        ]);

        $department = $campus->departments()->create([
            "name" => "College of Engineering"
        ]);

        $department->programs()->create([
            "name" => "Bachelor of Science in Civil Engineering"
        ]);
        $department->programs()->create([
            "name" => "Bachelor of Science in Computer Engineering"
        ]);
        $department->programs()->create([
            "name" => "Bachelor of Science in Electronics Engineering"
        ]);


        $department = $campus->departments()->create([
            "name" => "College of Computer Studies"
        ]);

        $department->programs()->create([
            "name" => "Bachelor of Science in Computer Science"
        ]);
        $department->programs()->create([
            "name" => "Bachelor of Science in Information Technology"
        ]);
        $department->programs()->create([
            "name" => "Bachelor of Science in Information Systems"
        ]);


        $department = $campus->departments()->create([
            "name" => "College of Industrial Technology"
        ]);


        $department->programs()->create([
            "name" => "Bachelor in Technical-Vocational Teacher Education (BTVTEd)"
        ]);
        $department->programs()->create([
            "name" => "Bachelor of Science in Industrial Technology"
        ]);



        $campus = Campus::create([
            "name" => "Tacurong Campus"
        ]);


        $department = $campus->departments()->create([
            "name" => "College of Arts and Sciences"
        ]);

        $department->programs()->create([
            'name' => 'Bachelor of Arts in Economics'
        ]);
        $department->programs()->create([
            'name' => 'Bachelor of Arts in Political Science'
        ]);
        $department->programs()->create([
            'name' => 'Bachelor of Science in Biology'
        ]);
        $department->programs()->create([
            'name' => 'Bachelor of Science in Environmental Science'
        ]);


        $department = $campus->departments()->create([
            "name" => "College of Business Administration and Hospitality Management"
        ]);

        $department->programs()->create([
            'name' => 'Bachelor of Science in Entrepreneurship'
        ]);
        $department->programs()->create([
            'name' => 'Bachelor of Science in Accountancy'
        ]);
        $department->programs()->create([
            'name' => 'Bachelor of Science in Management Accounting'
        ]);
        $department->programs()->create([
            'name' => 'Bachelor of Science in Hospitality Management'
        ]);
        $department->programs()->create([
            'name' => 'Bachelor of Science in Accounting Information System'
        ]);
        $department->programs()->create([
            'name' => 'Bachelor of Science in Tourism Management'
        ]);


        $campus = Campus::create([
            "name" => "Kalamansig Campus"
        ]);


        $department = $campus->departments()->create([
            "name" => "College of Education"
        ]);

        $department->programs()->create([
            'name' => 'Diploma in Teaching'
        ]);
        $department->programs()->create([
            'name' => 'Bachelor of Science in Secondary Education'
        ]);
        $department->programs()->create([
            'name' => 'Bachelor in Elementary Education'
        ]);



        $department = $campus->departments()->create([
            "name" => "College of Fisheries"
        ]);


        $department->programs()->create([
            'name' => 'Bachelor in Biology'
        ]);
        $department->programs()->create([
            'name' => 'Bachelor in Fisheries'
        ]);


        $department = $campus->departments()->create([
            "name" => "College of Criminal Justice Education"
        ]);

        $department->programs()->create([
            'name' => 'Bachelor of Science in Criminology'
        ]);

        $department = $campus->departments()->create([
            "name" => "College of Computer Studies"
        ]);

        $department->programs()->create([
            'name' => 'Bachelor of Science in Information Technology'
        ]);


        $campus = Campus::create([
            "name" => "Bagumbayan Campus"
        ]);


        $department = $campus->departments()->create([
            "name" => "College of Agribusiness"
        ]);


        $department->programs()->create([
            'name' => 'Bachelor of Science in Agribusiness'
        ]);
        $department->programs()->create([
            'name' => 'Bachelor of Technology and Livelihood Education major in Agri-fisheries'
        ]);



        $campus = Campus::create([
            "name" => "Palimbang Campus"
        ]);


        $department = $campus->departments()->create([
            "name" => "College of Agriculture"
        ]);

        $department->programs()->create([
            'name' => 'Bachelor of Science in Agribusiness'
        ]);

        $department = $campus->departments()->create([
            "name" => "College of Education"
        ]);

        $department->programs()->create([
            'name' => 'Bachelor in Elementary Education'
        ]);



        $campus = Campus::create([
            "name" => "Lutayan Campus"
        ]);


        $department = $campus->departments()->create([
            "name" => "College of Agriculture"
        ]);


        $department->programs()->create([
            'name' => 'Bachelor in Agricultural Technology'
        ]);
        $department->programs()->create([
            'name' => 'Bachelor of Science in Agriculture'
        ]);

        $department = $campus->departments()->create([
            "name" => "College of Education"
        ]);


        $department->programs()->create([
            'name' => 'Bachelor in Elementary Education'
        ]);
    }
}