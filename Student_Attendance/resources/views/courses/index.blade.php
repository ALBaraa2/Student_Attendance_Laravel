<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<div class="container">

    <h1>Welcom to Courses page</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add new Course</a>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <table class = "table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Coures id</th>
            <th>Course Name</th>
            <th>Description</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->course_id }}</td>
            <td>{{ $course->name }}</td>
            <td>{{ $course->description }}</td>
            <td>
                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
