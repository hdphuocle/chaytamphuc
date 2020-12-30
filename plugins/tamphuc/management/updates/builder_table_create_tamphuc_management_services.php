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
            $table->string('others')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tamphuc_management_services');
    }
}
