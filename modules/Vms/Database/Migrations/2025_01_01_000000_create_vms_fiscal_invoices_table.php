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
    public function up()
    {
        Schema::create('vms_fiscal_invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->integer('document_id');
            $table->string('invoice_type')->default('Normal'); // Normal, Refund, Copy, Training
            $table->string('transaction_type')->default('Sale'); // Sale, Refund
            $table->string('sdc_invoice_number')->nullable();
            $table->string('verification_url')->nullable();
            $table->text('verification_qr_code')->nullable();
            $table->string('sdc_time')->nullable();
            $table->string('mrc')->nullable();
            $table->string('cashier_tin')->nullable();
            $table->string('buyer_tin')->nullable();
            $table->decimal('total_amount', 15, 4)->default(0);
            $table->text('sdc_response_payload')->nullable();
            $table->string('status')->default('pending'); // pending, success, failed
            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['company_id', 'document_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vms_fiscal_invoices');
    }
};
