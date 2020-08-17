<?php namespace Codecycler\UserPlus\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UserTableUpdateUsersHandleMiddlename extends Migration
{
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('middlename')->nullable();
            $table->string('last_name_without_middlename')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('middlename');
            $table->string('last_name_without_middlename')->nullable();
        });
    }
}