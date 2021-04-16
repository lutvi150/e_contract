<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text("contract_number")->nullable();
            $table->text("job_name")->nullable();
            $table->string("id_skpd",5)->nullable();
            $table->string('id_field',5)->nullable();
            $table->string('id_user',5)->nullable();
            $table->string("ppk_name",200)->nullable();
            $table->bigInteger("ceiling")->nullable();
            $table->bigInteger("contract_value")->nullable();
            $table->string("procuretment_type",3)->nullable();
            $table->string("source_founds",200)->nullable();
            $table->string("status",20)->nullable();//draf,process,refuse, success
            $table->string("method_selection",3)->nullable();
            $table->string("addendum",3)->nullable();
            $table->text("provider")->nullable();
            $table->string('contract_date',200)->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
