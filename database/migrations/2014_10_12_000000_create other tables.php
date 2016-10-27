<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('direccion',45);
            $table->string('telefono',45);
            $table->timestamps();
        });
        Schema::create('facturas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('clientes_id');
            $table->date('fecha');
            $table->double('total',15,2);
            $table->timestamps();

        });
        Schema::create('productos', function (Blueprint $table){
            $table->increments('id');
            $table->string('denominacion',100);
            $table->double('costo',12,2);
            $table->double('precio',12,2);
            $table->timestamps();
        });
        Schema::create('detalle',function (Blueprint $table){
            $table->increments('id');
            $table->integer('facturas_id');
            $table->integer('productos_id');
            $table->integer('cantidad');
            $table->double('precio',12,2);
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
        Schema::drop('Clientes');
        Schema::drop('facturas');
        Schema::drop('detalle');
        Schema::drop('productos');
    }
}
