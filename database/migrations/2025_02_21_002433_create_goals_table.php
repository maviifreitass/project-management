<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->enum('status', ['completed', 'in_progress', 'not_started'])->default('not_started');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('goals');
    }
    
};
