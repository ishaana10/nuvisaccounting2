@php
    $fiscalInvoice = \Modules\Vms\Models\FiscalInvoice::where('document_id', $document->id)->first();
@endphp

@if($fiscalInvoice && $fiscalInvoice->status === 'success')
    <div class="card mt-4 border border-primary">
        <div class="card-header bg-light">
            <h4 class="mb-0 text-primary">Fiji FRCS VMS Fiscal Verification</h4>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <p class="mb-1"><strong>SDC Invoice Number:</strong> {{ $fiscalInvoice->sdc_invoice_number }}</p>
                    <p class="mb-1"><strong>SDC Time:</strong> {{ $fiscalInvoice->sdc_time }}</p>
                    <p class="mb-1"><strong>MRC:</strong> {{ $fiscalInvoice->mrc }}</p>
                    <p class="mb-1"><strong>Cashier TIN:</strong> {{ $fiscalInvoice->cashier_tin }}</p>
                    @if($fiscalInvoice->buyer_tin)
                        <p class="mb-1"><strong>Buyer TIN:</strong> {{ $fiscalInvoice->buyer_tin }}</p>
                    @endif
                    <p class="mb-0">
                        <strong>Verification URL:</strong>
                        <a href="{{ $fiscalInvoice->verification_url }}" target="_blank" rel="noopener">{{ $fiscalInvoice->verification_url }}</a>
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    @if($fiscalInvoice->verification_qr_code)
                        <img src="{{ $fiscalInvoice->verification_qr_code }}" alt="FRCS QR Code" class="img-fluid style-qr" style="max-width: 140px;" />
                        <div class="small text-muted mt-1">Scan to Verify</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
