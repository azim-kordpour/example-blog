<?php

use App\Enums\PostStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('writer_id')->constrained('users')->nullOnDelete();
            $table->string('title', 255)->unique();
            $table->string('description', 255);
            $table->string('introduction', 255);
            $table->text('body');
            $table->enum('status', PostStatus::values())->default(PostStatus::Draft->value);
            $table->string('slug', 255)->unique()->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
