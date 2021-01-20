<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTamphucManagementNavbar extends Migration
{
    public function up()
    {
        Schema::create('tamphuc_management_navbar', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('url');
            $table->string('sub_url')->nullable();
            $table->integer('location_id')->unsigned();
            $table->boolean('is_available')->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tamphuc_management_navbar');
    }
}
