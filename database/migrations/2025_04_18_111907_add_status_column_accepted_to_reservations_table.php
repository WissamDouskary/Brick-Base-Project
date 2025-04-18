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
        DB::statement('ALTER TABLE reservations DROP CONSTRAINT IF EXISTS reservations_status_check');

        DB::statement("ALTER TABLE reservations ADD CONSTRAINT reservations_status_check CHECK (status IN ('Pending', 'Completed', 'Failed', 'Accepted'))");
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE reservations DROP CONSTRAINT IF EXISTS reservations_status_check');
        DB::statement("ALTER TABLE reservations ADD CONSTRAINT reservations_status_check CHECK (status IN ('Pending', 'Completed', 'Failed'))");
    }
};
