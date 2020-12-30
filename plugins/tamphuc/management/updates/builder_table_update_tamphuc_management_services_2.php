<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTamphucManagementServices2 extends Migration
{
    public function up()
    {
        Schema::table('tamphuc_management_services', function($table)
        {
            $table->integer('position')->nullable();
            $table->boolean('is_available')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('tamphuc_management_services', function($table)
        {
            $table->dropColumn('position');
            $table->dropColumn('is_available');
        });
    }
}
