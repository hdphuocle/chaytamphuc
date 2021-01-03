<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTamphucManagementServices3 extends Migration
{
    public function up()
    {
        Schema::table('tamphuc_management_services', function($table)
        {
            $table->string('image_url', 255)->nullable();
            $table->string('icon', 191)->nullable()->change();
            $table->string('others', 191)->default(null)->change();
            $table->integer('position')->default(0)->change();
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
    
    public function down()
    {
        Schema::table('tamphuc_management_services', function($table)
        {
            $table->dropColumn('image_url');
            $table->string('icon', 191)->nullable(false)->change();
            $table->string('others', 191)->default('NULL')->change();
            $table->integer('position')->default(NULL)->change();
            $table->timestamp('created_at')->nullable()->default('NULL');
            $table->timestamp('updated_at')->nullable()->default('NULL');
        });
    }
}
