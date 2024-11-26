<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<div class="container">
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->

    <form action="{{ route ('assistants.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="id_number">ID number</label>
            <input type="number" name="id_number" id="id_number" class="form-control">
        </div>

        <div class="form-group">
            <label for="phone">Phone number</label>
            <input type="number" name="phone_number" id="phone" class="form-control">
        </div>

        <div class="form-group">
            <label for="address">address</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">ADD</button>
    </form>

</div>
