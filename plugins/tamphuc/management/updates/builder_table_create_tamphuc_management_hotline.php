<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTamphucManagementHotline extends Migration
{
    public function up()
    {
        Schema::create('tamphuc_management_hotline', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('phone_number');
            $table->string('location')->nullable();
            $table->boolean('is_available')->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tamphuc_management_hotline');
    }
}
