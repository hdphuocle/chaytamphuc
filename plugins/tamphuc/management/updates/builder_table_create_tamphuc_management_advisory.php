<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTamphucManagementAdvisory extends Migration
{
    public function up()
    {
        Schema::create('tamphuc_management_advisory', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->string('subject')->nullable();
            $table->text('content')->nullable();
            $table->string('phone');
            $table->string('address')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tamphuc_management_advisory');
    }
}
