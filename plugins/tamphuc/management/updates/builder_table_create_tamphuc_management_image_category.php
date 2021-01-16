<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTamphucManagementImageCategory extends Migration
{
    public function up()
    {
        Schema::create('tamphuc_management_image_category', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('image_url');
            $table->integer('position')->default(0);
            $table->boolean('is_available')->default(1);
            $table->integer('location_id')->unsigned();
            $table->string('alt')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tamphuc_management_image_category');
    }
}
