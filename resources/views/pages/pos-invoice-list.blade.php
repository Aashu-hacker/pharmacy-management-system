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
                                            <!-- Print Invoice Button -->
                                            <a href="{{ route('print-invoice', ['id' => $invoice->id]) }}" class="btn btn-sm btn-info mr-1">
                                                <i class="ti ti-printer f-18"></i>
                                            </a>

                                            <!-- Delete Invoice Button -->
                                            <a href="#" onclick="confirmDelete(event, {{ $invoice->id }})" class="btn btn-sm btn-danger">
                                                <i class="ti ti-trash f-18"></i>
                                            </a>

                                            <!-- Delete Form (Hidden) -->
                                            <form id="delete-form-{{ $invoice->id }}"
                                                action="{{ route('delete-invoice', ['id' => $invoice->id]) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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
@if (session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        showConfirmButton: true,
        timer: 2000
    });
</script>
@endif

@if (session('error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "{{ session('error') }}",
        showConfirmButton: true,
        timer: 2000
    });
</script>
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(event, invoiceId) {
        event.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "This will permanently delete the invoice.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form for deleting the invoice
                document.getElementById('delete-form-' + invoiceId).submit();
            }
        });
    }
</script>
@endauth