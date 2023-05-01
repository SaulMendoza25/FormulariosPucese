<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMypimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mypimes', function (Blueprint $table) {
            $table->id(); //id se genera automaticamente
            //Datos Generales
            $table->string('RUC')->nullable();
            $table->string('Business_name')->nullable();
            $table->string('Trade_name')->nullable();
            $table->integer('Number_of_collaborators')->nullable();
            $table->string('Formation_of_manager')->nullable();
            $table->string('Name_University')->nullable();
            $table->string('especialidad')->nullable();
            $table->string('Address')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('Province')->nullable();
            $table->string('County')->nullable();
            $table->string('Parish')->nullable();
            $table->integer('Contact_telephone_number')->nullable();
            $table->string('Owner_Legal_representative')->nullable();
            $table->string('Gender_Representative')->nullable();
            //Actividad Comercial y Categorias
            $table->string('logo')->nullable();//Opcional
            $table->string('up_image_logo')->nullable();//Opcional 
            $table->string('Number_of_establishments')->nullable();
            $table->date('Business_start_date')->nullable();
            $table->string('Category')->nullable();
            //$table->string('producto_severcios_detalle');
            $table->string('Products_or_services_details')->nullable();
            $table->string('Fair_trade_products')->nullable();
            $table->string('Foreign_trade')->nullable();
            $table->string('validacion_de_Paises')->nullable();
            $table->string('country_importaciones')->nullable();
            $table->string('country_exportacion')->nullable();

            //Localicacion georeferencia
            $table->string('Coordinatesx')->nullable();//Opcional 
            $table->string('Coordinatesy')->nullable();//Opcional 

            $table->string('image')->nullable();
            //Informcaion Tecnologica
            $table->string('E_commerce')->nullable();//Opcional 
            $table->string('Requires_training')->nullable();//Opcional 
            $table->string('Web_page')->nullable();//Opcional 
            $table->string('social_media')->nullable();//Opcional 
            $table->boolean('tipo_usuario')->default(0);
            $table->string('Whatsapp')->nullable();//Opcional 
            //
            //
            $table->rememberToken();
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
        Schema::dropIfExists('mypimes');
    }
}
