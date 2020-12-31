<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTamphucManagementSlide2 extends Migration
{
    public function up()
    {
        Schema::table('tamphuc_management_slide', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('href', 199)->default('null')->change();
        });
    }
    
    public function down()
    {
        Schema::table('tamphuc_management_slide', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->string('href', 199)->default('NULL')->change();
        });
    }
}
