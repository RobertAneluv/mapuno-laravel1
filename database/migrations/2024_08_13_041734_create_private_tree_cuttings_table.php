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
        Schema::create('private_tree_cuttings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('admin_id');
            $table->string('app_letter', 50);
            $table->enum('app_letter_compliant', ['Yes', 'No'])->nullable();
            $table->string('app_letter_remarks', 50)->nullable();
            $table->string('land_Title', 50);
            $table->enum('land_Title_compliant', ['Yes', 'No'])->nullable();
            $table->string('land_Title_remarks', 50)->nullable();
            $table->string('endorsement_Certification', 50);
            $table->enum('endorsement_Certification_compliant', ['Yes', 'No'])->nullable();
            $table->string('endorsement_Certification_remarks', 50)->nullable();
            $table->string('homeowner_Reso', 50);
            $table->enum('homeowner_Reso_compliant', ['Yes', 'No'])->nullable();
            $table->string('homeowner_Reso_remarks', 50)->nullable();
            $table->string('resolution', 50);
            $table->enum('resolution_compliant', ['Yes', 'No'])->nullable();
            $table->string('resolution_remarks', 50)->nullable();
            $table->enum('status', ['Pending', 'Approved', 'Declined'])->default('Pending');
            $table->date('app_Date')->nullable();
            $table->string('app_Loc', 30);

            
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('admin_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('private_tree_cuttings');
    }
};
