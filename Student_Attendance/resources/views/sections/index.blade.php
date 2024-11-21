<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<div class="container">
    <!-- When there is no desire, all things are at peace. - Laozi -->

    <h1>Welcom to Students page</h1>

    <a href="{{ route('sections.create') }}" class="btn btn-primary mb-3">Add section</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Course id</th>
                <th>Course name</th>
                <th>Year</th>
                <th>Semester</th>
            </tr>
        </thead>

        <tbody>
        @foreach($sections as $section)
            <tr>
                <td>{{ $section->course->course_id }}</td>
                <td>{{ $section->course->name }}</td>
                <td>{{ $section->year }}</td>
                <td>{{ $section->semester }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
