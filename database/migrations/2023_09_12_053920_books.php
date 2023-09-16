<?php

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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('creator');
            $table->string('depNameEn');
            $table->string('depName');
            $table->string('toPerson');
            $table->string('variableName');
            $table->dateTime('signDate');
            $table->longText('content');
            $table->string('thanks');
            $table->string('greeting');
            $table->string('toDo');
            $table->string('attach');
            $table->string('signatory');
            $table->string('image');
            $table->text('position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
