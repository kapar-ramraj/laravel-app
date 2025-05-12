@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @include('layouts.flash_message')
                                <h3 class="card-title">Employees List</h3>

                                <div class="card-tools">
                                    <form action="">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="search" class="form-control float-right"
                                                placeholder="Search" value="{{request()->search}}">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <br/>

                                <div>
                                    <a href="{{ route('employee.create') }}" class="btn btn-primary float-right mt-2">Add
                                        Employee</a>
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
                                            <th>Salary</th>
                                            <th>Designation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($employees as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->fname }}</td>
                                                <td>{{ $item->lname }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->salary }}</td>
                                                <td>{{ $item->designation }}</td>
                                                <td>
                                                    <a href="{{ route('employee.edit', $item->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="{{ route('employee.delete', $item->id) }}"
                                                        onclick="return confirm('Delete this User?')"
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

<script></script>
