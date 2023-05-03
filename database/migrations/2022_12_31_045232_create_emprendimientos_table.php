<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprendimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprendimientos', function (Blueprint $table) {
            $table->id();
            $table->string('name_proyect')->nullable();
            $table->string('name_property')->nullable();
            $table->string('addresses')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            //$table->string('require_trainings')->nullable();
            $table->string('theme_require_trainings')->nullable();
            $table->string('upload_proyect')->nullable();
           // $table->string('logo')->nullable();
            $table->string('main_products')->nullable();
            $table->string('main_service')->nullable();
            $table->string('main_investment_source')->nullable();
            $table->string('principal_investment_range')->nullable();
            $table->integer('number_employees')->nullable();
            $table->string('up_image_logo')->nullable();
            $table->string('up_image_main_products')->nullable();
            $table->string('up_image_main_mark')->nullable();
            $table->boolean('tipo_usuario')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprendimientos');
    }
}
