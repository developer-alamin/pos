<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpTvAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ip_tv_apps', function (Blueprint $table) {
            $table->id();
            $table->string('icon');
            $table->string('app_name');
            $table->string('link')->nullable();
            $table->string('apk_file')->nullable();
            $table->string('user_id')->nullable();
            $table->string('is_home')->default(0);
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
        Schema::dropIfExists('ip_tv_apps');
    }
}
