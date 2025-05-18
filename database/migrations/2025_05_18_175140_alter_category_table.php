<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     //softDelete merupakan function yang berfungsi melakukan penghapusan data tetapi tidak secara utuh, artinya
     //data tersebut seolah olah tersimpan di recycle bin sehingga memungkinkan terhindar dari foreign key constraint

    public function up(): void
    {
        Schema::table('categories',function (Blueprint $table){
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories',function (Blueprint $table){
            $table->softDelete();
        });
    }
};
