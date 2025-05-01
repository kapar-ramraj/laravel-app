@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create User</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="/user/store" class="mb-4">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">First Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter First Name" name="fname">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Last Name</label>
                                        <input type="text" class="form-control" id=""
                                            placeholder="Enter First Name" name="lname">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="" placeholder="Enter Email"
                                            name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="number" class="form-control" id="" placeholder="Enter Phone"
                                            name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="Password" name="password">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Users Information</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
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
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->fname }}</td>
                                                <td>{{ $item->lname }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>
                                                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="{{ route('user.delete', $item->id) }}" onclick="return confirm('Delete this User?')"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </section>
    </div>
    <!-- /.card -->
@endsection
