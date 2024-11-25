<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<div class="container">

    <h1>Students</h1>
    <!-- Order your soul. Reduce your wants. - Augustine -->

    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID number</th>
                <th>Student ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
            </tr>
        </thead>

        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->user->id_number }}</td>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->user->address }}</td>
                <td>{{ $student->user->email }}</td>
                <td>{{ $student->user->phone_number }}</td>
                <td>{{ $student->gender }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
