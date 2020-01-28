<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('paper_id')->unsigned();
            $table->foreign('paper_id')->references('id')->on('papers');
            $table->bigInteger('contestant_id')->unsigned();
            $table->foreign('contestant_id')->references('id')->on('contestants');
            $table->bigInteger('expert_id')->unsigned();
            $table->foreign('expert_id')->references('id')->on('experts');
            $table->string('notfn_content', 191);
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
        Schema::dropIfExists('notifications');
    }
}
