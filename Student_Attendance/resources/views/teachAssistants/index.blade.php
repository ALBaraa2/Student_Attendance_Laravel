<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<div class="container">

    <h1>Teach Assistants page</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
    <a href="{{ route('assistants.create') }}" class="btn btn-primary mb-3">Add teach assistant</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
            </tr>
        </thead>

        <tbody>
        @foreach($assistants as $assistant)
            <tr>
                <td>{{ $assistant->teach_assistant_id }}</td>
                <td>{{ $assistant->name }}</td>
                <td>{{ $assistant->user->phone_number }}</td>
                <td>{{ $assistant->user->email }}</td>
                <td>{{ $assistant->user->address }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
