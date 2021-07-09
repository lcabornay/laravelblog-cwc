<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->timestamp('deleted_at');
        });

        Schema::table('articles', function($table) {
            $table->timestamp('deleted_at');
        });

        Schema::table('article_categories', function($table) {
            $table->timestamp('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('articles', function($table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('article_categories', function($table) {
            $table->dropColumn('deleted_at');
        });
    }
}
