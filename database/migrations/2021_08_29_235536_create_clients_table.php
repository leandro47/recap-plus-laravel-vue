<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->string('cpf_cnpj');
            $table->string('name');
            $table->string('cep');
            $table->string('district');
            $table->string('street');
            $table->string('number');
            $table->string('phone')->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('email');
            $table->enum('type', ['J', 'F'])->default('F');
            $table->timestamps();
            $table->date('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
