<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('views', function (Blueprint $table) {
            $table->id();
            $table->string('client_ip');
            $table->bigInteger('short_link_id')->unsigned()->nullable();
            $table->string('picture')->nullable();
            $table->timestamps();
        });

        Schema::table('views', function (Blueprint $table) {
            $table->foreign('short_link_id')->references('id')->on('short_links')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('views');
    }
}
