<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        \DB::table('configurations')->insert([
            'label' => 'Admin Email',
            'key' => 'admin_email',
            'value' => 'armin.sm64@yahoo.com',
            'type' => 'textbox'
        ]);

        \DB::table('configurations')->insert([
            'label' => 'About Me',
            'key' => 'about_me',
            'value' => $faker->paragraph(),
            'type' => 'textarea'
        ]);

        \DB::table('configurations')->insert([
            'label' => 'Site Description',
            'key' => 'site_description',
            'value' => implode('<br>', $faker->paragraphs($nb = 3)),
            'type' => 'wysiwyg'
        ]);

        \DB::table('configurations')->insert([
            'label' => 'Site Logo',
            'key' => 'site_logo',
            'type' => 'file'
        ]);

        \DB::table('configurations')->insert([
            'label' => 'Date of Birth',
            'key' => 'dob',
            'value' => '2014/03/21',
            'type' => 'date'
        ]);

        \DB::table('configurations')->insert([
            'label' => 'Run Batch Jobs On',
            'key' => 'batchjob_time',
            'value' => '01:30 AM',
            'type' => 'time'
        ]);

        \DB::table('configurations')->insert([
            'label' => 'Important Date/Time',
            'key' => 'date_time',
            'value' => '2015/01/01 01:30 AM',
            'type' => 'datetime'
        ]);

        \DB::table('configurations')->insert([
            'label' => 'Secret Number',
            'key' => 'secret_number',
            'value' => '23',
            'type' => 'number'
        ]);

        \DB::table('configurations')->insert([
            'label' => 'Favorite Fruit',
            'key' => 'favorite_fruit',
            'value' => '["apple","banana"]',
            'type' => 'checkbox',
            'options' => '{"apple":"Apple","orange":"Orange","watermelon":"Watermelon","banana":"Banana"}'
        ]);

        \DB::table('configurations')->insert([
            'label' => 'Gender',
            'key' => 'gender',
            'value' => 'male',
            'type' => 'radio',
            'options' => '{"male":"Male","female":"Female"}'
        ]);

        \DB::table('configurations')->insert([
            'label' => 'Age',
            'key' => 'age',
            'value' => '2',
            'type' => 'select',
            'options' => '{"0":"< 10","1":"10 - 25","2":"26-40","3":"> 40"}'
        ]);

        \DB::table('configurations')->insert([
            'label' => 'Favorite Color',
            'key' => 'favorite_color',
            'value' => '["blue","green","white"]',
            'type' => 'multiple',
            'options' => '{"blue":"Blue","red":"Red","yellow":"Yellow","green":"Green","white":"White"}'
        ]);
    }

}