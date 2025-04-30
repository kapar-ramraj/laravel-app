<!DOCTYPE html>
<html lang="en">

<head>
    <title>Users </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <h3>User Form</h3>
        <form method="POST" action="/user/store" class="mb-4">
            @csrf
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="name">First Name</label>
                    <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                </div>
                <div class="col-md-4">
                    <label for="name">Last Name</label>
                    <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                </div>
                <div class="col-md-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                
                <div class="col-md-3">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                </div>
                <div class="col-md-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password" required>
                </div>
                <div class="col-12">
                    <button type="submit" name="add" class="btn btn-success">Add User</button>
                </div>
            </div>
        </form>

        <h2 class="mt-4">Users records :</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->fname}}</td>
                    <td>{{$item->lname}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>
                        <a href="edit.php?id={{$item->id}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="?delete={{$item->id}}" onclick="return confirm('Delete this User?')" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>