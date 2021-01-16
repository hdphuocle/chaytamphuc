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
            $table->boolean('is_available')->default(TRUE);
        });
    }

    public function down()
    {
        Schema::table('tamphuc_management_type', function($table)
        {
            $table->dropColumn('position');
            $table->dropColumn('is_available');
        });
    }
}
