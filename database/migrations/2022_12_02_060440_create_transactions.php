<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->foreignId('wallet_id');
            $table->bigInteger('code');
            $table->string('name');
            $table->smallInteger('mutation');
            $table->integer('amount');
            $table->timestamp('date')->nullable();
            $table->text('description');
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
        Schema::dropIfExists('transactions');
    }
};
