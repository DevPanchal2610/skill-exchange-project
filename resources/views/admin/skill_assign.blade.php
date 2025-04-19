@extends('admin.AdminLayout.content')
@push('sitemap')
    {{ 'Skill Assigned' }}
@endpush
@section('title', 'Skill Assigned')
@section('main-content')
<!-- Skill Assigned List -->
<div class="card-body mt-4">
    <div class="dt-responsive table-responsive">
        <table class="table table-bordered table-striped table-hover">

            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Assigner Name</th>
                    <th>Assigned User</th>
                    <th>Skill</th>
                    <th>Assigned Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($skill_assigns as $skill_assign)
                <tr>
                    <td>{{ $skill_assign->skill_assgin_id }}</td>
                    <td>{{ $skill_assign->assignedUser->fullname ?? 'N/A' }}</td>
                    <td>{{ $skill_assign->assigner->fullname ?? 'N/A' }}</td>
                    <td>{{ $skill_assign->skill->skill_name ?? 'N/A' }}</td>
                    <td>{{ optional($skill_assign->created_at)->format('d-m-Y') }}</td>
                    <td>{{ $skill_assign->isactive == 1 ? 'Active' : 'Inactive' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
