<?php

use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder {

    public function run()
    {
        \DB::table('configurations')->insert([
            'option' => 'admin_email',
            'value' => null
        ]);
    }

}