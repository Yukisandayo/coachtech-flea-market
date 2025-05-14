<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeProfileFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
        $table->string('name')->nullable()->change();
        $table->string('profile_image')->nullable()->change();
        $table->integer('postal_code')->nullable()->change();
        $table->string('address')->nullable()->change();
        $table->string('building')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change();
            $table->string('profile_image')->nullable(false)->change();
            $table->integer('postal_code')->nullable(false)->change();
            $table->string('address')->nullable(false)->change();
            $table->string('building')->nullable(false)->change();
        });
    }
}
