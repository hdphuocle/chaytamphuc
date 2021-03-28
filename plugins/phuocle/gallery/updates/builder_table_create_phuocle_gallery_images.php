<?php namespace PhuocLe\Gallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePhuocleGalleryImages extends Migration
{
    public function up()
    {
        Schema::create('phuocle_gallery_images', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('describe')->nullable();
            $table->integer('position')->default(0);
            $table->boolean('is_availble')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('phuocle_gallery_images');
    }
}
