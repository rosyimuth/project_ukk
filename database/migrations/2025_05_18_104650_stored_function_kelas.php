<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("
            CREATE FUNCTION ketKelas(kls CHAR(1)) RETURNS VARCHAR(20)
            DETERMINISTIC
            BEGIN
                IF kls = 'A' THEN
                    RETURN '12 SIJA A';
                ELSEIF kls = 'B' THEN
                    RETURN '12 SIJA B';
                END IF;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP FUNCTION IF EXISTS ketKelas;");
    }
};