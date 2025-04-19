@extends('admin.AdminLayout.content')
@push('sitemap')
    {{'Request'}}
@endpush
@section('title', 'Requests')
@section('main-content')

<!-- Request List -->
<div class="card-body mt-4">
    <div class="dt-responsive table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Request ID</th>
                    <th>User    </th>
                    <th>Assigned To</th>
                    <th>Skill ID</th>
                    <th>Active</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                <tr>
                    <td>{{ $request->request_id }}</td>
                    <td>{{ $request->user->fullname }}</td>
                    <td>{{ $request->assigner->fullname }}</td>
                    <td>{{ $request->skill->skill_name }}</td>
                    <td>{{ $request->isactive == 1 ? "Active" : "Inactive" }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
