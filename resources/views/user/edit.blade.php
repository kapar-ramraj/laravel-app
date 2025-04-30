<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit User</h2>
        <form method="POST" action="{{route('user.update',$user->id)}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>First Name</label>
                <input type="text" name="fname" class="form-control" value="{{$user->fname}}">
            </div>
            <div class="mb-3">
                <label>Last Name</label>
                <input type="text" name="lname" class="form-control" value="{{$user->fname}}">
            </div>
            
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{$user->email}}">
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="mobile" class="form-control" value="{{$user['phone']}}">
            </div>
            
            <button type="submit" name="update" class="btn btn-primary" value="update User">Update</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>