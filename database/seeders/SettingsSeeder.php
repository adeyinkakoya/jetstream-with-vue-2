<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use anlutro\LaravelSettings\Facade as Setting;


class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Setting::set('app_name','Artisana');
       Setting::set('version','1.0');
       Setting::set('logo','logo.png');
       Setting::set('email','info@artisana.com');
       Setting::set('copyright_text','Copyright (c) 2021. All rights reseved');
       Setting::save();
    }
}
