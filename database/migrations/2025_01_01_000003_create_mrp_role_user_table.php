<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $table = config('role-permession.tables.role_user', 'role_user');

        if (Schema::hasTable($table)) {
            return;
        }

        $morph = config('role-permession.morph', 'authorizable');

        Schema::create($table, function (Blueprint $blueprint) use ($morph) {
            $blueprint->id();
            $blueprint->foreignId('role_id')
                ->constrained(config('role-permession.tables.roles', 'roles'))
                ->cascadeOnDelete();
            $blueprint->morphs($morph);
            $blueprint->timestamps();

            $blueprint->unique(
                ['role_id', "{$morph}_id", "{$morph}_type"],
                'role_user_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(config('role-permession.tables.role_user', 'role_user'));
    }
};
