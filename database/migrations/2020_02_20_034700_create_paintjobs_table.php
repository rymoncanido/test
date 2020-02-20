<?php
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;
	class CreatePaintjobsTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('paintjobs', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->timestamps();
				// $table->enum('status',['0','1'])->default('0')->comment('0-pending 1-completed');
				$table->enum('last_color',['r','g','b']);
				$table->enum('new_color',['r','g','b']);
				$table->string('plate',12);
			});
		}
		/**
			* Reverse the migrations.
			*
			* @return void
		*/
		public function down()
		{
			Schema::dropIfExists('paintjobs');
		}
	}