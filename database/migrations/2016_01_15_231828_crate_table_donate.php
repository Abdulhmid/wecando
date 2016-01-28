<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTableDonate extends Migration
{
    protected $table = "donation";
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
              $table->integer('key_donate')->nullable();
              $table->enum('status', ['0','1'])->default('0');
              $table->string('created_by')->default('system')->nullable();

              /* Foreign Key */
              $table->integer('campaign_id')->unsigned();
              $table->foreign('campaign_id')->references('id')
                  ->on('campaign')->onDelete('cascade')->onUpdate('cascade');
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
