<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContact extends Migration
{
    protected $table = "contact";
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
              $table->string('name')->nullable();
              $table->string('email')->nullable();
              $table->text('message')->nullable();
              $table->text('reply')->nullable();
              $table->enum('status', ['0','1'])->default('0');

              /* Action */
              $table->string('created_by')->default('system');
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
