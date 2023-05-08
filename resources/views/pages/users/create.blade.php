@extends('layouts.master')

@section('title', 'Create User')
@section('link')
    <li><a href="{{ route('users.index') }}"></a> Users</li>
    <li>Create</li>
@endsection
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Create New User</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action={{ route('users.store') }} method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter User Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Enter User Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirm">Password Confirm</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm-password"
                            placeholder="Enter Password Confirm">
                    </div>

                    <div class="form-group">
                        <label for="image">Select Avatar</label>
                        <x-uploader name="photo" typeFile="image/png, image/gif, image/jpeg" maxSize="200"
                            imageSize="50px" buttonColor="#89898" buttonHeight="90px" previewColor="#777777"
                            previewHeight="186px" cardWidth="230px" elementCount="1"/>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
    <!--/.col (left) -->
@endsection
