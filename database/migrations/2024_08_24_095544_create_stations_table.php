<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
            $table->float('time_duration', 8, 2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stations');
    }
};
