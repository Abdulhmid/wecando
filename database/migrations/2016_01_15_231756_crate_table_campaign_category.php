<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTableCampaignCategory extends Migration
{
    protected $table = "campaign_category";
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
              $table->string('name');
              $table->text('slug')->nullable();
              $table->text('description')->nullable();
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
