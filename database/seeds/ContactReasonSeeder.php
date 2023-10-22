<?php

use Illuminate\Database\Seeder;
use \App\Models\ContactReason;

class ContactReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactReason::create(['reason' => 'Doubt']);
        ContactReason::create(['reason' => 'Praise']);
        ContactReason::create(['reason' => 'Reclamation']);
        ContactReason::create(['reason' => 'Suggestion']);
    }
}
