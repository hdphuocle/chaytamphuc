<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTamphucManagementServices extends Migration
{
    public function up()
    {
        Schema::create('tamphuc_management_services', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('icon');
            $table->text('content');
            $table->boolean('is_available')->default(1);
            $table->string('icon', 191)->default('null');
            $table->string('others', 191)->default('null');
            $table->integer('position')->default(0);
            $table->string('image_url', 255)->default('null');

        });
    }

    public function down()
    {
        Schema::dropIfExists('tamphuc_management_services');
    }
}
