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
                                <h3 class="card-title">Edit Employee</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('employee.update', $employee->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">First Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter First Name" name="fname" value="{{ $employee->fname }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Last Name</label>
                                        <input type="text" class="form-control" id=""
                                            placeholder="Enter Last Name" name="lname" value="{{ $employee->lname }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="" placeholder="Enter Email"
                                            name="email" value="{{ $employee->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="number" class="form-control" id="" placeholder="Enter Phone"
                                            name="phone" value="{{ $employee->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Salary</label>
                                        <input type="number" class="form-control" id="exampleInputPassword1"
                                            placeholder="Salary" name="salary" value={{ $employee->salary }}>
                                    </div>
                                    @php
                                        $designations = ['Hr', 'Account', 'IT'];
                                    @endphp
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Designation</label>
                                        <select class="form-control" id="designation" name="designation">
                                            <option value="">Select Designation</option>
                                            @foreach ($designations as $item)
                                                <option value="{{ $item }}"
                                                    @if ($employee->designation == $item) selected @endif>{{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.card -->
@endsection
