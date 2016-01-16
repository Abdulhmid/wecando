<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTableCity extends Migration
{
    protected $table = "city";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->table)) {
            Schema::create($this->table, function (Blueprint $table) {

                /** Primary key  */
                $table->increments('city_id');

                /** Main data  */
                $table->integer('state_id')->unsigned();
                $table->string('name');


                /** Action */
                $table->nullableTimestamps();
                /** Foreign Key */
                $table->foreign('state_id')->references('state_id')->on('state')
                     ->onDelete('cascade')->onUpdate('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
