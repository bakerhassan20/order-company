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
            $table->enum('service_type',['برمجة نظام','تطوير نظام','دعم فني']);  // نوع الخدمه
            $table->longText('service_description'); // وصف الخدمه
            $table->date('service_start_date')->nullable(); // تاريخ بدأ الخدمة
            $table->date('service_end_date')->nullable(); // تاريخ انتهاء الخدمة
            $table->enum('service_status',['طلب جديد','قيد التنفيذ','منتهية','نشط','ملغي']); // حالة الخدمة
            $table->enum('invoice_status',['مدفوعه','غير مدفوعه','منتهية','ملغية','قيد الدفع']); //حالة الفاتورة
            $table->bigInteger('recipient')->nullable(); // مستلم الطلب
            $table->string('duration')->nullable(); //مدة الخدمة
            $table->integer('total_price')->nullable(); // سعر الخدمة
            $table->integer('recipient_price')->nullable(); // سعر الخدمة
            $table->integer('publish')->default(0); //  نشر

            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_mobile_no');
            $table->string('recipient_name')->nullable();
            $table->string('user_type')->nullable();

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
