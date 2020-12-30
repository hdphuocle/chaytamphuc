<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTamphucManagementMenu extends Migration
{
    public function up()
    {
        Schema::rename('tamphuc_management_list', 'tamphuc_management_menu');
    }
    
    public function down()
    {
        Schema::rename('tamphuc_management_menu', 'tamphuc_management_list');
    }
}
