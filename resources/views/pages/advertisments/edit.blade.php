@extends('layouts.master')
@section('title', 'Edit Users')
@section('link')
    <li><a href="{{ route('users.index') }}"></a> Users</li>
    <li>Edit</li>
@endsection
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit User</h3>
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
            <form action="{{ route('users.update', $user->id) }}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body row">
                    <div class="col-xs-12">
                        <div class="form-group col-xs-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter User Name" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="form-group col-xs-12">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter User Email" value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter Password">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="password_confirm">Password Confirm</label>
                            <input type="password" class="form-control" id="confirm-password" name="confirm-password"
                                placeholder="Enter Password Confirm">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="image">Select Avatar</label>
                            <x-upload-image name="image" multiple="false" limit="500" />
                        </div>
                        <div class="form-group col-xs-12">
                            <label>
                                <input type="checkbox" id="isActive" name="isActive" @checked($user->status)>
                                IsActive
                            </label>
                        </div>
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
            </form>
        </div><!-- /.box-body -->
    </div>
    <!--/.col (left) -->
@endsection
