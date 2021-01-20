<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTamphucManagementHotline extends Migration
{
    public function up()
    {
        Schema::table('tamphuc_management_hotline', function($table)
        {
            $table->integer('location_id')->unsigned();
            $table->dropColumn('location');
        });
    }
    
    public function down()
    {
        Schema::table('tamphuc_management_hotline', function($table)
        {
            $table->dropColumn('location_id');
            $table->string('location', 191)->nullable();
        });
    }
}
