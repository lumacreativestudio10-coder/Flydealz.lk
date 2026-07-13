<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('whatsapp_number')->nullable();
            $table->string('home_address')->nullable();
            $table->string('departure_location')->nullable();
            $table->string('destination_location')->nullable();
            $table->date('travel_date')->nullable();
            $table->integer('passengers')->default(1);
            $table->text('message')->nullable();
            
            // To make foreign key nullable without doctrine/dbal, we can drop the constraint and column and recreate it
            $table->dropForeign(['package_id']);
            $table->dropColumn('package_id');
        });
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreignId('package_id')->nullable()->constrained('packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
}
