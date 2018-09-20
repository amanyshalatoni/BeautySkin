<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('agreed');
            $table->string('code');
            $table->double('long');
            $table->double('lat');
            $table->enum('gender',['male','female','none']);
            $table->integer('age');
            $table->enum('type_skin',['oily skin','dry skin','normal skin','mix skin','sensitive skin - children']);
            $table->enum('color_skin',['very light','light','light medium','hantia','light brown','very dark']);
            $table->enum('color_hair',['light blond','red','blond','dark blond','dark brown','black']);
            $table->enum('freckles',['none','few','more']);
            $table->enum('eye_color',['light blue','gray','light green','blue','green','hazal','light brown','dark brown']);
            $table->enum('height',['under 150 cm','150-159 cm','160-169 cm','170-179 cm','180-189 cm','190-199 cm','more than 199']);
            $table->enum('weight',['under 40 kg','40-59 kg','60-79 kg','80-99 kg','100-119 kg','120-139 kg','140-159 kg','160-179 kg'.'180-199 kg','more than 200']);
            $table->enum('activities',['swimming','sports','working','relating','sunbathing']);
            $table->string('sensitivity');
            $table->string('fire');
            $table->string('spf');
            $table->string('water_resistance');
            $table->string('amount_cream');
            $table->string('image');
            $table->enum('type_of_person',['user','expert'])->default('user');
            $table->string('cv')->nullable();
            $table->boolean('blocked');
            $table->timestamps();
            $table->softDeletes();
            $table->rememberToken();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persons');

    }
}
