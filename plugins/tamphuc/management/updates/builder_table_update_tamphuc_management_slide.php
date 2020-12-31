<?php namespace TamPhuc\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTamphucManagementSlide extends Migration
{
    public function up()
    {
        Schema::table('tamphuc_management_slide', function($table)
        {
            $table->string('image_url', 255);
            $table->string('href', 199)->nullable();
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
    
    public function down()
    {
        Schema::table('tamphuc_management_slide', function($table)
        {
            $table->dropColumn('image_url');
            $table->dropColumn('href');
            $table->timestamp('created_at')->nullable()->default('NULL');
            $table->timestamp('updated_at')->nullable()->default('NULL');
        });
    }
}
