<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('contacts')) {
            return;
        }

        if (! Schema::hasColumn('contacts', 'user_id')) {
            Schema::table('contacts', function (Blueprint $table) {
                $table->foreignId('user_id')->nullable()->after('id')->constrained()->cascadeOnDelete();
            });
        }

        $emailUniqueIndex = DB::select("SHOW INDEX FROM contacts WHERE Key_name = 'contacts_email_unique'");
        if (! empty($emailUniqueIndex)) {
            Schema::table('contacts', function (Blueprint $table) {
                $table->dropUnique('contacts_email_unique');
            });
        }

        $scopedUniqueIndex = DB::select("SHOW INDEX FROM contacts WHERE Key_name = 'contacts_user_id_email_unique'");
        if (empty($scopedUniqueIndex)) {
            Schema::table('contacts', function (Blueprint $table) {
                $table->unique(['user_id', 'email'], 'contacts_user_id_email_unique');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('contacts')) {
            return;
        }

        $scopedUniqueIndex = DB::select("SHOW INDEX FROM contacts WHERE Key_name = 'contacts_user_id_email_unique'");
        if (! empty($scopedUniqueIndex)) {
            Schema::table('contacts', function (Blueprint $table) {
                $table->dropUnique('contacts_user_id_email_unique');
            });
        }

        $emailUniqueIndex = DB::select("SHOW INDEX FROM contacts WHERE Key_name = 'contacts_email_unique'");
        if (empty($emailUniqueIndex)) {
            Schema::table('contacts', function (Blueprint $table) {
                $table->unique('email', 'contacts_email_unique');
            });
        }

        if (Schema::hasColumn('contacts', 'user_id')) {
            Schema::table('contacts', function (Blueprint $table) {
                $table->dropConstrainedForeignId('user_id');
            });
        }
    }
};