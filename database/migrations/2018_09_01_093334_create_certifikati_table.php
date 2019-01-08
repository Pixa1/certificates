<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertifikatiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certifikati', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('lastname');
            $table->text('vendor');
            $table->text('shorttitle')->nullable();;
            $table->text('certname')->nullable();;
            $table->text('certver')->nullable();;
            $table->text('certpath')->nullable();;
            $table->text('examid')->nullable();
            $table->date('dateofach');
            $table->date('datevalid');
            $table->integer('deprecated')->default('0');
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
        Schema::dropIfExists('certifikati');
    }
}
