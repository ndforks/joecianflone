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
         $table->string('social_id')->index();
         $table->string("social_type")->index();
         $table->boolean("is_pinned")->default(false);
         $table->json("meta_data")->nullable();
         $table->json("data");
         $table->timestamp("social_created_at");

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
