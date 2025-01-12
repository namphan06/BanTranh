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
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->default(0.00)->after('name'); // Thêm cột price và giá trị mặc định là 0.00
        });
    }
    
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price'); // Xóa cột price nếu rollback
        });
    }
    
};