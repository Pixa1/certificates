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
            $table->text('shorttitle');
            $table->text('certname');
            $table->text('certver');
            $table->text('certpath');
            $table->text('examid')->nullable();
            $table->text('dateofach');
            $table->text('datevalid');
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
