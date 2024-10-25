@auth
@include('components.header', ['titlee' => 'Invoice'])
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Invoice List</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../navigation/index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Invoice</a></li>
                            <li class="breadcrumb-item" aria-current="page">List</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] start -->

        <!-- [ breadcrumb ] end -->

        <div class="row">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="col-lg-12 col-md-6">
                <div class="card">
                    <div class="card-body">

                        <div class="datatable-wrapper datatable-loading no-footer searchable fixed-columns">
                            <table class="table table-responsive" id="pc-dt-simple">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No.</th>
                                        <th class="text-center">Invoice No</th>
                                        <th class="text-center">Invoice Id</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $serial = 1; @endphp
                                    @foreach ($invoices as $invoice)
                                    <tr>
                                        <td class="text-center">{{ $serial++ }}</td>
                                        <td class="text-center">{{ __('INV00') }}{{ $invoice->invoicee_no }}</td>
                                        <td class="text-center">{{ $invoice->id }}</td>
                                        <td class="text-center">{{ $invoice->created_at->format('d-m-Y') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('print-invoice', ['id' => $invoice->id]) }}" class="btn btn-sm btn-info mr-1">
                                                <i class="ti ti-printer f-18"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('components.footer')
@endauth