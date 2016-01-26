<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTableNewsletter extends Migration
{
    protected $table = "newsletter";
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
              $table->string('title');
              $table->string('image');
              $table->text('content')->nullable();
              $table->text('slug')->nullable();
              $table->text('files')->nullable();
              $table->string('created_by')->default('system')->nullable();

              /* Action */
              $table->nullableTimestamps();
              $table->softDeletes();

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
