<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("tasks", function(Blueprint $table){
            $table->id();
            $table->integer("user_id");
            $table->string("task", length: 400);
            $table->text("content");
            $table->enum("status", ['Todo', 'Pending', 'Complete']);
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("tasks");
    }
};
