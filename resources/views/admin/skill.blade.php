@extends('admin.AdminLayout.content')
@push('sitemap')
    {{'Skill'}}
@endpush
@section('title', 'Skill')
@section('main-content')
<!-- State List -->
<div class="card-body mt-4">
    <div class="dt-responsive table-responsive">
        <table class="table table-bordered table-striped table-hover">

            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Skill name</th>
                    <th>skill discription</th>
                    <th>Image</th>
                    <th>User id</th>
                    <th>Active</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($skills as $skill)
                    <tr>
                        <td>{{ $skill->skill_id }}</td>
                        <td>{{ $skill->skill_name }}</td>
                        <td>{{ $skill->description }}</td>
                        <td><img src="{{ asset($skill->skill_image) }}" width="50"></td>
                        <td>{{ $skill->user_id}}</td>
                        <td>{{ $skill->isactive == 1 ? "Active" : "Inactive" }}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection