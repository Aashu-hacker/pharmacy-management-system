@auth
@include('components.header', ['titlee' => 'Category'])
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Category List</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../navigation/index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Medicine</a></li>
                            <li class="breadcrumb-item" aria-current="page">Category</li>
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
                        <div class="card-header text-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CategoryModel">Add Category</button>
                        </div>
                        <div class="datatable-wrapper datatable-loading no-footer searchable fixed-columns">
                            <table class="table table-responsive" id="pc-dt-simple">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No.</th>
                                        <th class="text-center">Category Name</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td class="text-center">{{ $category->category_name }}</td>
                                        <td class="text-center">
                                            @if ($category->status === 1)
                                            Active
                                            @else
                                            Inactive
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="" class="avtar avtar-xs btn btn-success btn-sm" data-bs-target="#CategoryEditModel{{$category->id}}" data-bs-toggle="modal" data-toggle="tooltip" data-placement="left" title="Update"><i class="ti ti-edit f-18" aria-hidden="true"></i></a>
                                            <a href="#" onclick="confirmDelete(event, {{ $category->id }})" class="avtar avtar-xs btn btn-danger btn-sm" data-toggle="tooltip" data-placement="left" title="Delete">
                                                <i class="ti ti-trash f-18" aria-hidden="true"></i>
                                            </a>

                                            <form id="delete-form{{ $category->id }}"
                                                action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    <div id="CategoryEditModel{{$category->id}}" class="modal fade" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
                                        <div class="modal-dialog  modal-lg" role="document">
                                            <form action="{{ route('categories.edit', ['category' => $category->id]) }}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('put')}}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Category</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label for="category_name" class="col-sm-3 col-form-label">Category Name</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="category_name" name="category_name" value="{{$category->category_name}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                                                            <div class="col-sm-6">
                                                                <label class="radio-inline my-2">
                                                                    <input type="radio" name="status" value="1" checked="checked" id="status">
                                                                    Active
                                                                </label>
                                                                <label class="radio-inline my-2">
                                                                    <input type="radio" name="status" value="0" id="status">
                                                                    Inactive
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Save</button></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="CategoryModel" class="modal fade" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
    <div class="modal-dialog  modal-lg" role="document">
        <form action="{{route('categories.store')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Category</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="category_name" class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="category_name" name="category_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-6">
                            <label class="radio-inline my-2">
                                <input type="radio" name="status" value="1" checked="checked" id="status">
                                Active
                            </label>
                            <label class="radio-inline my-2">
                                <input type="radio" name="status" value="0" id="status">
                                Inactive
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Save</button></div>
            </div>
        </form>
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
    function confirmDelete(event, categoryId) {
        event.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form
                document.getElementById('delete-form' + categoryId).submit();
            }
        });
    }
</script>

@endauth