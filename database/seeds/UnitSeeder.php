<?php

//  php artisan make:seeder FornecedorSeeder

use Illuminate\Database\Seeder;
use \App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit = new Unit();
        $unit->unit = 'kg';
        $unit->description = 'Kilogramms';
        $unit->save();

        
        $unit = new Unit();
        $unit->unit = 'unit';
        $unit->description = 'Unit';
        $unit->save();

    }
}
