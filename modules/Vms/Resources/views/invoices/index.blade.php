@extends('layouts.admin')

@section('title', trans('vms::general.fiscal_invoices'))

@section('content')
    <div class="card">
        <div class="card-header border-bottom-0">
            <h3 class="card-title">{{ trans('vms::general.fiscal_invoices') }}</h3>
        </div>

        <div class="table-responsive">
            <table class="table table-flush align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th>Document #</th>
                        <th>Type</th>
                        <th>SDC Invoice Number</th>
                        <th>SDC Time</th>
                        <th>Verification URL</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($fiscalInvoices as $item)
                        <tr>
                            <td>{{ $item->document ? $item->document->document_number : $item->document_id }}</td>
                            <td>{{ $item->invoice_type }} ({{ $item->transaction_type }})</td>
                            <td>{{ $item->sdc_invoice_number }}</td>
                            <td>{{ $item->sdc_time }}</td>
                            <td>
                                @if($item->verification_url)
                                    <a href="{{ $item->verification_url }}" target="_blank" rel="noopener">Link</a>
                                @endif
                            </td>
                            <td>
                                <span class="badge badge-pill badge-{{ $item->status === 'success' ? 'success' : 'danger' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No fiscalized records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {!! $fiscalInvoices->links() !!}
        </div>
    </div>
@endsection
