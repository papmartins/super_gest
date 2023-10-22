<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContactsAddFkContactReason extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // More steps to practice
        Schema::table('site_contacts', function (Blueprint $table) {            
            $table->unsignedBigInteger('contact_reason_id')->after('contact_reason');            
        });

        DB::statement('update site_contacts set contact_reason_id = contact_reason;'); // runs query in db
        
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->foreign('contact_reason_id')->references('id')->on('contact_reasons');
            $table->dropColumn('contact_reason');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->integer('contact_reason')->after('email');
        });

        DB::statement('update site_contacts set contact_reason = contact_reason_id;'); // runs query in db

        Schema::table('site_contacts', function (Blueprint $table) {
            $table->dropForeign('site_contacts_contact_reason_id_foreign');
            $table->dropColumn('contact_reason_id');
        });
    }
}
