<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTamphucManagementList extends Migration
{
    public function up()
    {
        Schema::create('tamphuc_management_list', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('location_id');
            $table->string('type_id');
            $table->text('describe')->nullable();
            $table->string('image_url')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('is_new')->default(false);
            $table->boolean('is_available')->default(false);
            $table->boolean('is_promotion')->default(false);
            $table->double('price', 10, 0)->nullable()->default(0);
            $table->double('price_promotion', 10, 0)->nullable()->default(0);
            $table->integer('position')->nullable()->default(0);
            $table->integer('location_id')->unsigned(false);
            $table->integer('type_id')->unsigned(false);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tamphuc_management_list');
    }
}
