<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagePathToLegendsTable extends Migration
{
    public function up()
    {
        Schema::table('legends', function (Blueprint $table) {
            $table->string('image_path')->nullable();
        });
    }

    public function down()
    {
        Schema::table('legends', function (Blueprint $table) {
            if (Schema::hasColumn('legends', 'image_path')) {
                $table->dropColumn('image_path');
            }
        });
    }
}    
    