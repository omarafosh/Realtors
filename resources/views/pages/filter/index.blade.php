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


            </div>
            <div class="box col-xs-8">

                @php
                    $data=DB::table('users')->get();

                    $columns=[1 => 'id', 2 => 'name'];
                    $label=  [1 => 'id', 2 => 'name'];
                @endphp
                <x-data-table :columns="$columns" :dataValue="$data"/>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
@endsection

@section('js')

@endsection
