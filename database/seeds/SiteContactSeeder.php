<?php

use Illuminate\Database\Seeder;
use \App\Models\SiteContact;

class SiteContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *      php artisan db:seed --class=SiteContatoSeeder
     * 
     * @return void
     */
    public function run()
    {
        factory(SiteContact::class,100)->create();
        
    }
}
