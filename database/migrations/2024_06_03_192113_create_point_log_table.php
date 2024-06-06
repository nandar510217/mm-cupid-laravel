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
        Schema::create('point_log', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('member_id');
            $table->unsignedInteger('status');
            $table->unsignedInteger('search_id');
            $table->unsignedInteger('date_request_id');
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
        Schema::dropIfExists('point_log');
    }
};
