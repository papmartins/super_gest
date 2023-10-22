<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\ContactReason;

class CreateContactReasonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_reasons', function (Blueprint $table) {
            $table->id();
            $table->string('reason',20);
            $table->timestamps();
        });

        // Create on seeder, is possible but must populate the tables with seeders
        // ContactReason::create(['reason' => 'Doubt']);
        // ContactReason::create(['contact_reasons' => 'Prise']);
        // ContactReason::create(['contact_reason' => 'Reclamationn']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_reasons');
    }
}
