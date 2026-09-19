<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('contact'); // 'contact' or 'project'
            $table->string('name');
            $table->string('email')->index();
            $table->string('phone')->nullable();
            $table->string('service')->nullable()->index();
            $table->text('message');
            $table->string('ip_address', 45)->nullable();
            $table->string('status')->default('new')->index(); // 'new', 'in_review', 'contacted', 'closed'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
