<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(): void
        {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->string('order_no');
                $table->string('name');
                $table->string('mobile');
                $table->string('email');
                $table->string('shipping_address');
                $table->string('notes');
                $table->foreignId('payment_method_id')->references('id')->on('payment_methods')->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('shipping_type_id')->references('id')->on('shipping_types')->cascadeOnDelete()->cascadeOnUpdate();
                $table->integer('total');
                $table->string('status')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(): void
        {
            Schema::dropIfExists('orders');
        }
    };
