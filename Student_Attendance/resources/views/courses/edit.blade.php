<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" action="{{ route('courses.update' , $course->id) }}"
        <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Course id:</label>
            <input type="text" id="course_id" value="{{ $course->course_id }}" disabled>
        </div>

        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" id="name" value="{{ $course->name }}">
        </div>

        <div class="form-group">
            <label>Description:</label>
            <input type="text" name="description" id="description" value="{{ $course->description }}">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
