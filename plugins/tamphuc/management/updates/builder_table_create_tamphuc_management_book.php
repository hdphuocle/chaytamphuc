<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTamphucManagementBook extends Migration
{
    public function up()
    {
        Schema::create('tamphuc_management_book', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->integer('quatity');
            $table->date('book_date');
            $table->string('date_type')->nullable();
            $table->string('phone');
            $table->text('note')->nullable();
            $table->string('address')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tamphuc_management_book');
    }
}
