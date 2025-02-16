<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('email');
            $table->integer('stars')->checkBetween([1, 5]); // 1-5 sao
            $table->string('image')->nullable(); // Đường dẫn ảnh đánh giá
            $table->text('comment')->nullable();
            $table->timestamp('rated_at')->default(now()); // Thời gian đánh giá
            
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('rates');
    }
};