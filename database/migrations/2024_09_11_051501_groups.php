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
        Schema::create('group', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('group_name')->unique();
            $table->string('created_by'); 
            $table->foreign('created_by')->references('username')->on('my_users')->onDelete('restrict')->onUpdate('restrict');
            $table->softDeletes('deleted_at'); 
            $table->timestamps();
        });
    
        Schema::create('group_members', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('group_id');
            $table->string('added_by'); 
            $table->foreign('user_id')->references('id')->on('my_users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('group_id')->references('id')->on('group')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('added_by')->references('username')->on('my_users')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
            $table->softDeletes('group_left_at'); 
        });
    
    
        Schema::create('posts', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('post_name')->unique();
            $table->unsignedBigInteger('posted_by');
            $table->unsignedBigInteger('group_id');
            $table->string('verified_by'); 
            $table->foreign('posted_by')->references('id')->on('my_users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('group_id')->references('id')->on('group')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('verified_by')->references('username')->on('my_users')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
            $table->softDeletes('post_deleted_at');
        });
    
        Schema::create('posts_verification', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('post_name')->unique();
            $table->unsignedBigInteger('posted_by');
            $table->unsignedBigInteger('group_id');
            $table->foreign('posted_by')->references('id')->on('my_users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('group_id')->references('id')->on('group')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
            $table->softDeletes('post_deleted_at');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_verification');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('group_members');
        Schema::dropIfExists('group');
    }
};    
