<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit State</title>
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Edit State</h2>

    

    <form action="/update_state" method="POST">
        @csrf
        <input type="hidden" class="form-control" id="state_id" name="state_id" value="{{ $state->state_id }}" required>

        <div class="mb-3">
            <label for="state_name" class="form-label">State Name</label>
            <input type="text" class="form-control" id="state_name" name="state_name" value="{{ $state->state_name }}" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="isactive" name="isactive" {{ $state->isactive ? 'checked' : '' }}>
            <label class="form-check-label" for="isactive">Active</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Update State</button>
        <a href="{{ url('/') }}" class="btn btn-secondary w-100 mt-2">Back</a>
    </form>
</div>

</body>
</html>
