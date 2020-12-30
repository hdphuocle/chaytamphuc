<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTamphucManagementMenu2 extends Migration
{
    public function up()
    {
        Schema::table('tamphuc_management_menu', function($table)
        {
            $table->integer('location_id')->nullable(false)->unsigned(false)->default(null)->change();
            $table->integer('type_id')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('tamphuc_management_menu', function($table)
        {
            $table->string('location_id', 191)->nullable(false)->unsigned(false)->default(null)->change();
            $table->string('type_id', 191)->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
