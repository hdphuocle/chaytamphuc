<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTamphucManagementType2 extends Migration
{
    public function up()
    {
        Schema::table('tamphuc_management_type', function($table)
        {
            $table->boolean('is_available')->default(TRUE);
        });
    }
    
    public function down()
    {
        Schema::table('tamphuc_management_type', function($table)
        {
            $table->dropColumn('is_available');
        });
    }
}
