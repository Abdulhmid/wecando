<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTableCampaign extends Migration
{
    protected $table = "campaign";
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
              $table->string('title')->nullable();
              $table->string('image')->nullable();
              $table->string('video')->nullable();
              $table->string('hastag')->nullable();
              $table->decimal('target',19,2)->default(0);
              $table->decimal('donate',19,2)->default(0);

              $table->timestamp('start');
              $table->timestamp('stop');

              $table->text('detail')->nullable();
              $table->tinyInteger('status')->default(1);

              $table->string('created_by')->default('system')->nullable();
              /* Action */
              $table->nullableTimestamps();
              $table->softDeletes();

              $table->text('files')->nullable();
              /* Foreign Key */
              $table->integer('location_id')->unsigned();
              $table->foreign('location_id')->references('city_id')
                  ->on('city')->onDelete('cascade')->onUpdate('cascade');

              /* Foreign Key */
              $table->integer('category_id')->unsigned();
              $table->foreign('category_id')->references('id')
                  ->on('campaign_category')->onDelete('cascade')->onUpdate('cascade');

              /* Foreign Key */
              $table->integer('member_id')->unsigned();
              $table->foreign('member_id')->references('id')
                  ->on('users')->onDelete('cascade')->onUpdate('cascade');

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
