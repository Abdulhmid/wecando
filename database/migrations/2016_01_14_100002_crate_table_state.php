<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTableState extends Migration
{
    protected $table = "state";
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
                $table->increments('state_id');

                /** Main data  */
                $table->string('country');
                $table->string('name');
                $table->text('description')->nullable();
                /** Foreign Key */
                
                /** Action */
                $table->nullableTimestamps();
                
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
