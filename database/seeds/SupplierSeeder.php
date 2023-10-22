<?php

//  php artisan make:seeder FornecedorSeeder

use Illuminate\Database\Seeder;
use \App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 3 different methods
        
        // object instance
        $supplier = new Supplier();
        $supplier->name = 'Supplier 100';
        $supplier->site = 'fornecedor100.pt';
        $supplier->uf = 'CE';
        $supplier->email = 'contact@fornecedor100.pt';
        $supplier->save();

        // Method create - atention fillable in class
        Supplier::create(
            [
                'name' => 'Supplier 200',
                'site' => 'fornecedor200.pt',
                'uf' => 'RS',
                'email' => 'contact@fornecedor200.pt'
            ]
        );
        

        // Don't fill the timestamps
        DB::table('suppliers')->insert(
            [
                'name' => 'Supplier 300',
                'site' => 'fornecedor300.pt',
                'uf' => 'SP',
                'email' => 'contact@fornecedor300.pt'
            ]
        );
    }
}
