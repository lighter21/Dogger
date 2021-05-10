<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('walk_id')->constrained();
            $table->foreignId('pet_id')->constrained();
            //Id osoby która zgodziła sie na przystąpienie do spaceru
            $table->foreignId('tenant_id')->constrained('users');
            //Porozumienie jest aktywne do czasu zakonczenia spaceru, lub w momencie jego anulowania
            $table->boolean('active');
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
        Schema::dropIfExists('agreements');
    }
}
