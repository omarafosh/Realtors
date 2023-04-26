@extends('layouts.master')

@section('title', 'List Users')

@section('css')
@endsection

@section('link')
    <li><a href={{ route('users.index') }}></a> Users</li>
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">

                <h3 class="box-title"></h3><br>
                <a class="btn btn-success text-white add-button" href="{{ route('users.create') }}"> Create New User</a>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr align="center">
                                <td style="vertical-align:middle">{{ $key + 1 }}</td>
                                <td style="vertical-align:middle">{{ $item->name }}</td>
                                <td style="vertical-align:middle">{{ $item->email }}</td>
                                <td style="vertical-align:middle" width="200px"><img src={{ $item->getFirstMediaUrl('avtars','thumb')}} alt=""></td>
                                <td style="vertical-align:middle">
                                    <span
                                        class="badge bg-{{ $item->status == 0 ? 'black' : 'green' }}">{{ $item->status == 0 ? 'غير مفعل' : 'مفعل' }}</span>
                                </td>
                                <td style="vertical-align:middle" class="d-inline-flex">
                                    <div id="actions">
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('users.edit', $item->id) }}">Edit</a>
                                        <form action="{{ route('users.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger show_confirm">
                                                Del
                                            </button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
@endsection

@section('js')

@endsection
