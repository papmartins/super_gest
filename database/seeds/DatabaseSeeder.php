<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // necessário para correr com php artisan db:seed
        // comentar para evitar que repita a inserção 
        // ou utilizar    php artisan db:seed --class=SiteContatoSeeder
        $this->call(SupplierSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(SiteContactSeeder::class);
        $this->call(ContactReasonSeeder::class);
    }
}
