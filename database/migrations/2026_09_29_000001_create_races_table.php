<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up():void { Schema::create('races',function(Blueprint $t){$t->id();$t->string('code',12)->unique();$t->string('status')->default('open');$t->json('names')->nullable();$t->json('results')->nullable();$t->timestamps();}); } public function down():void { Schema::dropIfExists('races'); } };
