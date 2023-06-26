@extends('layouts.master')

@section('title', 'List Users')

@section('css')
@endsection

@section('link')
    <li><a href={{ route('users.index') }}></a> Users</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 d-flex">
            <div class="col-xs-4">
                <x-filter-data></x-filter-data>
            </div>
            <div class="box col-xs-8">
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


                        <tr align="center">
                            <td style="vertical-align:middle"><input type="checkbox"></td>
                            <td style="vertical-align:middle"></td>
                            <td style="vertical-align:middle"></td>
                            <td style="vertical-align:middle"></td>
                            <td style="vertical-align:middle" width="200px">

                                <img src="" alt="">


                            </td>
                            <td style="vertical-align:middle">
                                <span class="badge"></span>
                            </td>
                            <td style="vertical-align:middle" class="d-inline-flex">
                                <div id="actions">
                                    <a class="btn btn-sm btn-primary" href="">Edit</a>
                                    <form action="" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger show_confirm">
                                            Del
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
@endsection

@section('js')

@endsection
