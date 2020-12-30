<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTamphucManagementMenu3 extends Migration
{
    public function up()
    {
        Schema::table('tamphuc_management_menu', function($table)
        {
            $table->integer('location_id')->unsigned()->change();
            $table->integer('type_id')->unsigned()->change();
        });
    }
    
    public function down()
    {
        Schema::table('tamphuc_management_menu', function($table)
        {
            $table->integer('location_id')->unsigned(false)->change();
            $table->integer('type_id')->unsigned(false)->change();
        });
    }
}
