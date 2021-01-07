<?php namespace PhuocLe\BlogComments\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreatePhuocLeBlogcommentsComments extends Migration
{
    public function up()
    {
        Schema::create('phuocle_blogcomments_comments', function($table)
        {

            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('parent_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->integer('post_id')->nullable();
            $table->text('comment')->nullable();
            $table->smallInteger('status')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('url');
            $table->ipAddress('ip')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('phuocle_blogcomments_comments');
    }
}
