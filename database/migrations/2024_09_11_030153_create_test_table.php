<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('test', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('status');
            $table->date('applied_at')->nullable();
            $table->text('memo')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('test');
    }
};
