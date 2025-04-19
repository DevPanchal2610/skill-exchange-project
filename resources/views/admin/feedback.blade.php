@extends('admin.AdminLayout.content')
@push('sitemap')
    {{'Feedback'}}
@endpush
@section('title', 'Feedback')
@section('main-content')

<!-- Feedback List -->
<div class="card-body mt-4">
    <div class="dt-responsive table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Feedback Details</th>
                    <th>User ID</th>
                    <th>Active</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->feedback_id }}</td>
                    <td>{{ $feedback->feedback_details }}</td>
                    <td>{{ $feedback->user->fullname }}</td>
                    <td>{{ $feedback->isactive == 1 ? "Active" : "Inactive" }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
