<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_rule', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('rule_id');

            $table->foreign('permission_id')
            ->references('id')
            ->on('permissions')
            ->onDelete('cascade');

            $table->foreign('rule_id')
                ->references('id')
                ->on('rules')
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
        Schema::dropIfExists('permission_rule');
    }
}
