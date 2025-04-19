<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit City</title>
    
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
    <h2 class="text-center">Edit City</h2>

    <form action="/update_city" method="POST">
        @csrf
        <input type="hidden" class="form-control" id="city_id" name="city_id" value="{{ $city->city_id }}" required>

        <!-- State Selection -->
        <div class="mb-3">
            <label for="state_id" class="form-label">State Name</label>
            <select class="form-select" id="state_id" name="state_id" required>
                <option value="">Select State</option>
                @foreach($states as $state)
                    <option value="{{ $state->state_id }}" 
                        {{ $city->state_id == $state->state_id ? 'selected' : '' }}>
                        {{ $state->state_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- City Name -->
        <div class="mb-3">
            <label for="city_name" class="form-label">City Name</label>
            <input type="text" class="form-control" id="city_name" name="city_name" value="{{ $city->city_name }}" required>
        </div>

        <!-- Active Checkbox -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="isactive" name="isactive" {{ $city->isactive ? 'checked' : '' }}>
            <label class="form-check-label" for="isactive">Active</label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">Update City</button>
        <a href="{{ url('/') }}" class="btn btn-secondary w-100 mt-2">Back</a>
    </form>
</div>

</body>
</html>
