<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_log', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('min_age');
            $table->unsignedInteger('max_age');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('updated_by');
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('search_log');
    }
};
