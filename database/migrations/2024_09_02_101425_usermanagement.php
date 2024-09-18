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
        Schema::create('my_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['Moderator','Admin','User']);
            $table->softDeletes('deleted_at', precision: 0); 
            $table->timestamps();
        });
        Schema::create('add_users', function(Blueprint$table){
            $table->bigIncrements(('pending_id'));
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_users');
    }
};
