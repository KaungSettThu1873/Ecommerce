<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_banks', function (Blueprint $table) {
            $table->id();
           $table->uuid('user_id'); // users.id (uuid) နဲ့ type ကိုက်အောင်
    $table->foreign('user_id')
          ->references('id')
          ->on('users')
          ->onDelete('cascade');
            $table->foreignId('bank_id')->references('id')->on('banks')->onDelete('cascade');
            $table->string('bank_acc_name');
            $table->string('bank_acc_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_banks');
    }
};
