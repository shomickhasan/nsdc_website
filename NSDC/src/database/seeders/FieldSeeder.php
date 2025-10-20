<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FieldConfiguration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FieldSeeder extends Seeder
{
    
    public function run(): void
    {
        $fields = [
            ['name' => 'input1', 'lable_name' => ''],
            ['name' => 'input2', 'lable_name' => ''],
            ['name' => 'input3', 'lable_name' => ''],
            ['name' => 'input4', 'lable_name' => ''],
            ['name' => 'input5', 'lable_name' => ''],
            ['name' => 'input6', 'lable_name' => ''],
            ['name' => 'input7', 'lable_name' => ''],
            ['name' => 'input8', 'lable_name' => ''],
            ['name' => 'input9', 'lable_name' => ''],
            ['name' => 'input10', 'lable_name' => ''],
            ['name' => 'input11', 'lable_name' => ''],
            ['name' => 'input12', 'lable_name' => ''],
            ['name' => 'input13', 'lable_name' => ''],
            ['name' => 'input14', 'lable_name' => ''],
            ['name' => 'input15', 'lable_name' => ''],
            ['name' => 'input16', 'lable_name' => ''],
            ['name' => 'input17', 'lable_name' => ''],
            ['name' => 'input18', 'lable_name' => ''],
            ['name' => 'input19', 'lable_name' => ''],
            ['name' => 'input20', 'lable_name' => ''],
        ];

        foreach ($fields as $field) {
            FieldConfiguration::updateOrCreate(
                ['name' => $field['name']],
                ['lable_name' => $field['lable_name']]
            );
        }
    }
}
