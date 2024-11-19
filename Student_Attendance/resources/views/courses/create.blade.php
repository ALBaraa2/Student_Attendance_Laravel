
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<div class="container">
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    <h1>Create new Course</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post" action="{{ route('courses.store') }}">
        @csrf

        <div class="form-group">
            <label for="course_id">Course id:</label>
            <input
                type="text"
                id="course_id"
                name="course_id"
                class="form-control"
                value="{{ $errors->any() ? old('course_id') : '' }}">
        </div>

        <div class="form-group">
            <label for="name">Course Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $errors->any() ? old('name') : '' }}">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" class="form-control" value="{{ $errors->any() ? old('description') : '' }}">
        </div>

        <button type="submit" class="btn btn-success">Add Course</button>
    </form>
</div>

