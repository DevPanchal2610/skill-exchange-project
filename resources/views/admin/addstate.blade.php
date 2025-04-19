@extends('admin.AdminLayout.content')
@push('sitemap')
    {{'State'}}
@endpush
@section('title', 'state')
@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <!-- Title -->
            <div class="text-center mb-4">
                <h1 class="fw-bold">State</h1>
            </div>

            <!-- SweetAlert for Success Message -->
            @if(session('success'))
            <script>
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
            @endif

            <!-- Card -->
            <div class="card shadow-lg">
                <div class="card-body">
                    <!-- Form -->
                    <form action="/add_state" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label">Enter State:</label>
                            <input type="text" class="form-control" name="state" placeholder="Enter state name">
                            <span style="color:red">@error('state'){{$message}}@enderror</span>
                        </div>
                        <!-- Submit Button -->
                        <div class="text-center">
                            <button class="btn btn-primary me-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- State List -->
<div class="card-body mt-4">
    <div class="dt-responsive table-responsive">
        <table class="table table-bordered table-striped table-hover">

            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>State</th>
                    <th>IsActive</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($states as $state)
                <tr>
                    <td>{{ $state->state_id }}</td>
                    <td>{{ $state->state_name }}</td>
                    <td>{{ $state->isactive == 1 ? "Active" : "Inactive" }}</td>
                    <td>
                        <a href="/delete_state/{{ $state->state_id }}" onclick="return confirmDelete();">
                            <button class="btn btn-danger">Delete</button>
                        </a>&nbsp;|&nbsp;
                        <a href="/edit_state/{{ $state->state_id }}">
                            <button class="btn btn-info">Edit</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection