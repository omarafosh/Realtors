@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="btnAdd col-xs-3">
            <a href="javascript:void(0)" class="btn btn-success form-control addRow">Add</a>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="row mt-2 ml-2">
                    {{-- <div class="alert"> --}}
                    {{-- @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                {{var_dump($errors->all())}}
                    @error('name.*')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="box-body">

                    <form action="{{ route('languages.store') }}" method="post" id="formLocal">
                        @csrf
                        <table width="65%">
                            <thead>
                                <th>#</th>
                                <th width="25%">Name</th>
                                <th>Locale</th>
                                <th>Native</th>
                                <th>Status</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="btnAdd col-xs-3">
                            <input type="submit" value="SaveChanges" class="btn btn-success form-control saveRow'">
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section>
@endsection
@include('layouts.partials._js')
@section('js')
    <script>
        var counter = 1
        var i = 0
        $('.btnAdd').on('click', '.addRow', function() {
            ++i;
            var row = `
                    <tr>
                        <td>
                            ${ counter++ }
                        </td>
                        <td>
                            <select id="name" name="languages[${i}][name]" class="form-control">
                                @foreach (config('translatable.supportedLocales') as $key => $item)
                                    <option  value="{{ $item['lang_name'] }}" data-native="{{ $item['lang_native'] }}" data-local="{{ $item['lang_local'] }}">{{ $item['lang_name'] }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <input type="text" id="local" name="languages[${i}][local]" class="form-control">
                        </td>
                        <td>
                            <input type="text" id="native" name="languages[${i}][native]" class="form-control">
                        </td>
                        <td>
                            <input type="text" id="status" name="languages[${i}][status]" class="form-control">
                        </td>
                        <th class="mb-2">
                            <a href="javascript:void(0)" class="btn btn-danger form-control delRow">Del</a>
                        </th>
                    </tr>`
            $('tbody').append(row);
        });

        $('tbody').on('click', '.delRow', function() {
            $(this).parent().parent().remove();
        });
        $('tbody').on('change', 'tr', function() {
            var natvies = $('tbody #native')
            var local = $('tbody #local')
            natvies[$(this).index()].value = $(this).find('option:selected').data('native');
            local[$(this).index()].value = $(this).find('option:selected').data('local');
        });
   
    </script>
@endsection
