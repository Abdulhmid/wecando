<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCommentNewsletter extends Migration
{
    protected $table = "newsletter_comments";
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
                $table->text('comment')->nullable();
                $table->string('created_by')->default('anonim');
                $table->tinyInteger('status')->default(0);

                /* Action */
                $table->timestamps();

                // Relation
                $table->integer('newsletter_id')->unsigned()->nullable();

                $table->foreign('newsletter_id')
                        ->references('id')->on('newsletter')
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
