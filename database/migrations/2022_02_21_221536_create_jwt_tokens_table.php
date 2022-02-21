<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJwtTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jwt_tokens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('unique_id');
            $table->string('token_title');
            $table->json('restrictions')->nullable();
            $table->json('permissions')->nullable();
            $table->timestamps();
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('refreshed_at')->nullable();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jwt_tokens', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        
        Schema::dropIfExists('jwt_tokens');
    }
}
