<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTamphucManagementServices4 extends Migration
{
    public function up()
    {
        Schema::table('tamphuc_management_services', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('icon', 191)->default('null')->change();
            $table->string('others', 191)->default('null')->change();
            $table->integer('position')->default(0)->change();
            $table->string('image_url', 255)->default('null')->change();
        });
    }
    
    public function down()
    {
        Schema::table('tamphuc_management_services', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->string('icon', 191)->default('NULL')->change();
            $table->string('others', 191)->default('NULL')->change();
            $table->integer('position')->default(NULL)->change();
            $table->string('image_url', 255)->default('NULL')->change();
        });
    }
}
