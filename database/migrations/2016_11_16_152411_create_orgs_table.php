<?php

  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Database\Migrations\Migration;

  class CreateOrgsTable extends Migration
  {
    /**
    * Запуск миграций
    *
    * @return void
    */
    public function up()
    {
      Schema::create('orgs', function (Blueprint $table) {
        $table->increments('id');
        $table->string('orgs_name');
        $table->string('orgs_adress');
        $table->timestamps();
      });
    }

    /**
    * Откатить миграции
    *
    * @return void
    */
    public function down()
    {
      Schema::drop('orgs');
    }
  }
