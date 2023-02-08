<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD:database/migrations/2023_02_08_214213_add_column_firstname_to_users_table.php
class AddColumnFirstnameToUsersTable extends Migration
=======
class DeleteEmailVerifiedAtColumnFromUsersTable extends Migration
>>>>>>> 859a9ac94ea663dfdb63226d7fae7f941274c648:database/migrations/2023_02_07_120317_delete_email_verified_at_column_from_users_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
<<<<<<< HEAD:database/migrations/2023_02_08_214213_add_column_firstname_to_users_table.php
            $table->string('firstname');
=======
            $table->dropColumn('email_verified_at');
>>>>>>> 859a9ac94ea663dfdb63226d7fae7f941274c648:database/migrations/2023_02_07_120317_delete_email_verified_at_column_from_users_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
