<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email');
            $table->string('phoneno')->nullable();
            $table->string('jobrole');

            $table->string('description')->nullable();
            $table->string('file')->nullable();
            $table->string('stage1')->default('0')->comment('Application ACCEPT or REJECT');
            $table->string('interview')->default('0')->comment('Interview ACCEPT or REJECT');

            $table->string('offering_letter')->default('0')->comment('send offering letter =1');
            $table->string('onboard')->default('0')->comment('onboard wait =0 complete = 1');

            // $table->BigInteger('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->timestamps();

            // $table->increments('id');
            // // $table->unsignedBigInteger('user_id');
            // $table->string('FirstName');
            // $table->string('LastName');
            // $table->string('email')->unique();
            // // $table->timestamp('email_verified_at')->nullable();
            // $table->string('phone');
            // $table->string('second no');
            // $table->string('jobrole');
            // $table->string('file')->nullable();
            // $table->string('stage1')->default('0')->comment('Application ACCEPT or REJECT');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
