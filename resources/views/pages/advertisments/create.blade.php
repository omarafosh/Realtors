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
                    <div class="form-group col-xs-4">
                        <label for="name">Type Realtors</label>
                        <select class="form-control">
                            <option value="0" selected>Apartment</option>
                            <option value="1">Land</option>
                            <option value="2">Shop</option>
                            <option value="3">Office</option>
                        </select>
                    </div>
                    <div class="form-group col-xs-4">
                        <label for="email">Salary</label>
                        <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter salary">
                    </div>
                    <div class="form-group col-xs-4">
                        <label for="rooms">Rooms</label>
                        <input type="text" class="form-control" id="rooms" name="rooms"
                            placeholder="Enter Count Rooms">
                    </div>
                    <div class="form-group col-xs-4">
                        <label for="bath_room ">Bath Room </label>
                        <input type="text" class="form-control" id="bath_room" name="bath_room"
                            placeholder="Enter Count Bath Room">
                    </div>
                    <div class="form-group col-xs-4">
                        <label for="area">Area </label>
                        <input type="text" class="form-control" id="area" name="area" placeholder="Enter Area">
                    </div>
                    <div class="form-group col-xs-4">
                        <label for="name">Evaluation</label>
                        <select class="form-control">
                            <option value="0" selected>1</option>
                            <option value="1">2</option>
                            <option value="2">3</option>
                            <option value="3">4</option>
                            <option value="3">5</option>
                        </select>
                    </div>
                    <div class="form-group col-xs-4">
                        <label for="location">Location </label>
                        <input type="text" class="form-control" id="location" name="location"
                            placeholder="Enter Location">
                    </div>
                    <div class="form-group col-xs-4">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration"
                            placeholder="Enter Duration">
                    </div>
                    <div class="form-group col-xs-4">
                        <div class="form-group">
                            <label for="state">
                                <input class="form-control" type="checkbox" id="isActive" name="isActive" checked> Is Active
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="advertiment_type">
                                <input type="checkbox" id="advertiment_type" name="advertiment_type" checked> Free
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-xs-12">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="5">

                        </textarea>

                    </div>

                    <div class="form-group col-xs-12">
                        <label for="image">Select Avatar</label>
                        <x-upload-image name="image" multiple="true" limit="200" />
                    </div>

                </div><!-- /.box-body -->

                <div class="box-footer col-xs-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
    <!--/.col (left) -->
@endsection
