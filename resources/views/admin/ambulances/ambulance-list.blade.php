@extends('admin.layouts.app')

{{-- page title --}}
@section('page-title')
    Ambulances List
@endsection

{{-- topbar page title --}}
@section('topbar-title')
    Ambulances
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-md-4">
                    {{-- <div class="mt-3 mt-md-0">
                        <a href="{{ route('ambulances.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="mdi mdi-plus-circle me-1"></i> Add
                        </a>
                    </div> --}}
                </div><!-- end col-->
                <div class="col-md-8">
                    <form action="" method="GET" class="d-flex flex-wrap align-items-center justify-content-sm-end">
                        @csrf
                        <label for="inputPassword2" class="visually-hidden">Search</label>
                        <div>
                            <input type="search" name="keyword" value="{{ Request::get('keyword') }}"
                                class="form-control my-1 my-md-0" id="inputPassword2" placeholder="Search...">
                        </div>
                    </form>
                </div>
            </div> <!-- end row -->
        </div>
    </div>
    {{-- category table --}}
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title mb-3">All ambulances</h4>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Approve</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($ambulances->isNotEmpty())
                            @foreach ($ambulances as $ambulance)
                                <tr>
                                    <th>
                                        {{ $loop->iteration + $ambulances->perPage() * ($ambulances->currentPage() - 1) }}
                                    </th>
                                    <th>

                                        <img src="{{ Storage::url('ambulance/' . $ambulance->image) }}"
                                            alt="{{ $ambulance->name }}" class="object-fit-cover rounded" width="50px">
                                    </th>
                                    <td>{{ $ambulance->name }}</td>
                                    <td>{{ $ambulance->phone }}</td>
                                    <td>
                                        @if ($ambulance->is_approved == 1)
                                            <i class="fe-check text-success"></i>
                                        @else
                                            <i class="fe-x text-danger"></i>
                                        @endif
                                    </td>

                                    <td>
                                        {{-- <a href="{{ route('ambulances.edit', $ambulance->id) }}"
                                            class="btn btn-success waves-effect waves-light">
                                            <i class="mdi mdi-square-edit-outline"></i>
                                        </a> --}}
                                        <a href="#" onclick="deleteAmbulance({{ $ambulance->id }})"
                                            class="btn btn-danger waves-effect waves-light delete-spe">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="6">No Records Found!</td>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    {{-- pagination --}}
    <div class="pagination-rounded">
        {{ $ambulances->links() }}
    </div>
@endsection


@section('customJs')
    <script>
        function deleteAmbulance(id) {
            let url = "{{ route('ambulances.destroy', 'Id') }}";
            let newUrl = url.replace("Id", id);

            Swal.fire({
                    title: '<span style="color: #595959;">Are you sure?</span>',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: newUrl,
                            type: 'delete',
                            data: {},
                            dataType: 'json',
                            success: function(response) {
                                if (response.status == true) {
                                    Swal.fire(
                                        '<span style="color: #595959;">Deleted!</span>',
                                        'User has been deleted.',
                                        'success'
                                    ).then((result) => {
                                        window.location.href =
                                            "{{ route('ambulances.index') }}";
                                    })
                                } else {
                                    Swal.fire(
                                        '<span style="color: #595959;">Oops...</span>',
                                        'Something went wrong!',
                                        'error'
                                    ).then((result) => {
                                        window.location.href =
                                            "{{ route('ambulances.index') }}";
                                    })
                                }
                            }
                        });

                    }
                });
        };
    </script>
@endsection