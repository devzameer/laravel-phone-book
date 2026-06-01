<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if( Schema::hasTable('users') && Schema::hasColumn( 'users' , 'confirm_password')){
            Schema::table('users' , function (Blueprint $table){
                $table->dropColumn('confirm_password');
            });
        }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if(Schema::hasTable('users') && !Schema::hasColumn( 'users' , 'confirm_password')){
            Schema::table('users', function (Blueprint $table) {
            $table->string('confirm_password');
            });
        }
        
    }
};
