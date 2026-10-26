<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $table = config('role-permession.tables.role_abilities', 'role_abilities');

        if (Schema::hasTable($table)) {
            return;
        }

        Schema::create($table, function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->foreignId('role_id')
                ->constrained(config('role-permession.tables.roles', 'roles'))
                ->cascadeOnDelete();
            $blueprint->string('ability');
            $blueprint->enum('type', ['allow', 'deny']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(config('role-permession.tables.role_abilities', 'role_abilities'));
    }
};
