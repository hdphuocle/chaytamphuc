<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTamphucManagementType extends Migration
{
    public function up()
    {
        Schema::table('tamphuc_management_type', function($table)
        {
            $table->integer('position')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('tamphuc_management_type', function($table)
        {
            $table->dropColumn('position');
        });
    }
}
