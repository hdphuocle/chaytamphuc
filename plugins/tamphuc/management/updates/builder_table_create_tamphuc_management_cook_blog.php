<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTamphucManagementCookBlog extends Migration
{
    public function up()
    {
        Schema::create('tamphuc_management_cook_blog', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 255);
            $table->string('title', 255);
            $table->text('content')->nullable();
            $table->boolean('is_new')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->boolean('is_available')->default(0);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tamphuc_management_cook_blog');
    }
}
