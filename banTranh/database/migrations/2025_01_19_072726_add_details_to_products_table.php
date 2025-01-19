<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('size')->nullable();        // Kích thước
            $table->string('material')->nullable();    // Chất liệu
            $table->boolean('frame')->default(false);  // Khung tranh (true = có, false = không)
            $table->string('condition')->nullable();   // Tình trạng
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['size', 'material', 'frame', 'condition']);
        });
    }
};

