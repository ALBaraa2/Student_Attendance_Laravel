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

    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
    <form action="{{route('students.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $errors->any() ? old('name') : '' }}">
        </div>

        <div class="form-group">
            <label for="id">ID:</label>
            <input type="number" name="id_number" id="id" class="form-control" value="{{ $errors->any() ? old('id_number') : '' }}">
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="number" name="phone_number" id="phone" class="form-control" value="{{ $errors->any() ? old('phone_number') : '' }}">
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $errors->any() ? old('address') : '' }}">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $errors->any() ? old('email') : '' }}">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <select name="gender" id="gender" class="form-control">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add</button>
    </form>
</div>


