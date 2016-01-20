<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSetting extends Migration
{
    protected $table = "setting";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable($this->table)) {

          Schema::create($this->table, function (Blueprint $table) {

              $table->engine = 'InnoDB';
              /** Primary key  */
              $table->increments('id');

              /** Main data  */
              $table->integer('user_id')->nullable();
              $table->decimal('donate',19,2)->default(0);
              $table->string('transfer_method')->nullable();
              $table->string('created_by')->default('system')->nullable();

              /* Foreign Key */
              /* Action */
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
