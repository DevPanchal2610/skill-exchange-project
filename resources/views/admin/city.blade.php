@extends('admin.AdminLayout.content')
@push('sitemap')
    {{'City'}}
@endpush
@section('title', 'state')
@section('main-content')
<div class="container mt-5">
    <h2 class="text-center mb-4">City Management</h2>

    <!-- City Form -->
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session("success") }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/city-add" method="post">
                @csrf
                <div class="mb-3">
                    <label for="state" class="form-label">Select State</label>
                    <select name="state" id="state" class="form-select">
                        <option value="">----Select State----</option>
                        @foreach ($data1 as $d)
                            <option value="{{ $d['state_id'] }}">{{ $d['state_name'] }}</option>
                        @endforeach
                    </select>
                    <span>@error('state'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">Enter City</label>
                    <input type="text" name="city" class="form-control" id="city" placeholder="Enter city name">
                    <span>@error('city'){{ $message }}@enderror</span>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- City Table -->
    <div class="card shadow">
        <div class="card-body">
            <h4 class="mb-3">City List</h4>
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>City</th>
                        <th>State</th>
                       
                        <th>IsActive</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->city_id }}</td>
                        <td>{{ $d->city_name }}</td>
                        <td>{{ $d->state->state_name }}</td>
                        <td>
                            {{ $d->isactive == 1 ? "Active" : "Inactive" }}
                        </td>
                        <td>
                            <a href="/delete_city/{{ $d->city_id }}" onclick="return confirmDelete();">
                                <button class="btn btn-danger">Delete</button>
                            </a>&nbsp;|&nbsp;
                            <a href="/edit_city/{{ $d->city_id }}">
                                <button class="btn btn-info">Edit</button>
                            </a>
                        </td>   
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection