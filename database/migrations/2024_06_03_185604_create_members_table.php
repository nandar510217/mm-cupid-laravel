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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('username', 250);
            $table->string('password', 250)->unique();
            $table->string('email', 250)->unique();
            $table->string('phone', 100);
            $table->string('email_confirm_code', 32);
            $table->unsignedTinyInteger('gender');
            $table->string('date_of_birth');
            $table->mediumText('education');
            $table->unsignedInteger('city_id');
            $table->mediumText('work');
            $table->integer('height_feet');
            $table->integer('height_inches');
            $table->unsignedTinyInteger('status');
            $table->text('about');
            $table->unsignedTinyInteger('partner_gender');
            $table->unsignedInteger('partner_min_age');
            $table->unsignedInteger('partner_max_age');
            $table->dateTime('last_login');
            $table->unsignedInteger('point');
            $table->unsignedInteger('view_count');
            $table->string('thumb_nail', 200);
            $table->longText('verify_image');
            $table->tinyInteger('religion');
            $table->unsignedInteger('created_by');
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
        Schema::dropIfExists('members');
    }
};
