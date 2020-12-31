<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTamphucManagementSlide3 extends Migration
{
    public function up()
    {
        Schema::table('tamphuc_management_slide', function($table)
        {
            $table->string('href', 199)->default('\'#book-now\'')->change();
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
    
    public function down()
    {
        Schema::table('tamphuc_management_slide', function($table)
        {
            $table->string('href', 199)->default('\'null\'')->change();
            $table->timestamp('created_at')->nullable()->default('NULL');
            $table->timestamp('updated_at')->nullable()->default('NULL');
        });
    }
}
