<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicTables extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::dropIfExists('streams');
      Schema::create('streams', function (Blueprint $table) {
         $table->string('id')->unique()->primary();
         $table->string('item_id')->index();
         $table->string("type")->index();
         $table->boolean("is_pinned")->default(false);
         $table->json("meta")->nullable();
         $table->json("content");
         $table->timestamp("item_created_at");
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
      Schema::drop('streams');
   }
}
