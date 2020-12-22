<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerTimestampsUsageUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            'CREATE TRIGGER TG_ON_INSERT_USERS 
            AFTER INSERT ON `users` FOR EACH ROW 
            INSERT INTO users (`created_at`, `updated_at`) VALUES (NOW(), NOW());'
        );
        DB::unprepared(
            'CREATE TRIGGER TG_ON_UPDATE_USERS 
            AFTER UPDATE ON `users` FOR EACH ROW 
            INSERT INTO users (`updated_at`) VALUES (NOW());'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `TG_ON_INSERT_USERS`;');
        DB::unprepared('DROP TRIGGER `TG_ON_UPDATE_USERS`;');
    }
}
