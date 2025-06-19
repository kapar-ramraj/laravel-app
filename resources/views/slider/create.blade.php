@extends('layouts.master')

@section('title')
Create sliders
@endsection

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
                                <h3 class="card-title">Create slider</h3>
                            </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{route('sliders.store')}}" class="mb-4" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Name">Name</label>
                                        <input type="text" class="form-control" id="title"
                                            placeholder="Slider Name" name="name" value="{{old('name')}}">
                                        @error('name')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputpublication_year1">Link</label>
                                        <input type="text" class="form-control" id="link"
                                            placeholder="link" name="link" value="{{old('link')}}">
                                        @error('link')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="document_path">Slider Image</label>
                                        <input type="file" class="form-control" id="document_path"
                                            placeholder="document_path" name="document_path" value="{{old('document_path')}}">
                                            @error('document_path')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Status </label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="">Select Status </option>
                                            @foreach (config('custom.status') as $key => $item)
                                                <option value="{{ $key }}"
                                                    {{ old('status') == $key ? 'selected' : '' }}>{{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
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
    </div>
    <!-- /.card -->
@endsection
