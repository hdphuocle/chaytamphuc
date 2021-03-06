<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTamphucManagementSlide extends Migration
{
    public function up()
    {
        Schema::create('tamphuc_management_slide', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 255);
            $table->string('title', 255);
            $table->text('content');
            $table->boolean('is_available')->default(0);
            $table->integer('position')->default(0);
            $table->string('href', 199)->default('#book-now');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tamphuc_management_slide');
    }
}
