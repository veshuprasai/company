<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company')->unique();
            $table->string('type')->nullable();
            $table->text('address')->nullable();
            $table->biginteger('phone')->nullable();
            $table->string('owner')->nullable();
            $table->string('shareholders')->nullable();
            $table->text('description')->nullable();
            $table->string('nepalidate')->nullable();
            $table->integer('is_active')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
