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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('service_type',['programming','development','technical']);  // نوع الخدمه
            $table->longText('service_description'); // وصف الخدمه
            $table->date('service_start_date')->nullable(); // تاريخ بدأ الخدمة
            $table->date('service_end_date')->nullable(); // تاريخ انتهاء الخدمة
            $table->enum('service_status',['new','underway','finished','active','canceled']); // حالة الخدمة
            $table->enum('invoice_status',['paid','unpaid','canceled','finished','pending']); //حالة الفاتورة
            $table->bigInteger('recipient')->nullable(); // مستلم الطلب
            $table->string('duration')->nullable(); //مدة الخدمة
            $table->integer('total_price')->nullable(); // سعر الخدمة
            $table->integer('recipient_price')->nullable(); // سعر الخدمة
            $table->integer('inquiry')->default(0); //  استفسار
            $table->integer('suggest_amount')->default(0); // وجود اقتراح مبلغ من المستلم
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
