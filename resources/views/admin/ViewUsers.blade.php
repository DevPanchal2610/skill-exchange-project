@extends('admin.AdminLayout.content')
@push('sitemap')
    {{'Users'}}
@endpush
@section('title', 'Users')
@section('main-content')
<!-- User List -->
<div class="card-body mt-4">
    <div class="dt-responsive table-responsive">
        <table class="table table-bordered table-striped table-hover">

            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Profile Image</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->profile_picture)
                                <img src="{{ asset($user->profile_picture) }}" width="50" height="50" class="rounded-circle">
                            @else
                                <img src="{{ asset('dist/assets/images/user/avatar-1.jpg') }}" width="50" height="50" class="rounded-circle">
                            @endif
                        </td>
                        <td>{{ $user->phone ?? 'N/A' }}</td>
                        <td>{{ $user->city->city_name ?? 'N/A' }}</td>
                        <td>{{ $user->isactive == 1 ? "Active" : "Inactive" }}</td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
