@extends('layouts.master')

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="row mt-2 ml-2">
                <div class="col-xs-3">
                    <label for="">Select The Default Language</label>
                    <select name="default_local" id="default_local" class="form-control">
                        @foreach (config('translatable.supportedLocales') as $key => $item)
                            <option id="{{ $key }}" value="{{ $item['lang_local'] }}"
                                native="{{ $item['lang_native'] }}">
                                {{ $item['lang_name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-2 ml-2">
                <div class="btnAdd col-xs-3">
                    <a href="javascript:void(0)" class="btn btn-success form-control addRow">Add</a>
                </div>

                <div class="col-xs-3">
                    <a href="javascript:void(0)" class="btn btn-success form-control ssaveRow">Save</a>
                </div>
            </div>
            <div class="col-xs-12">

                <form action="" method="post" id="formLocal">
                    @csrf
                    <table width="50%">


                        <thead>
                            <th>#</th>
                            <th width="25%">Name</th>
                            <th>Locale</th>
                            <th>Native</th>
                        </thead>

                        <tbody>

                            {{-- @foreach ($data as $items)
                    @endforeach --}}


                            @error('lang_name')
                                <h1>fsdfsdfsdfsdf</h1>
                            @enderror
                        </tbody>
                    </table>
                    <input type="submit" value="SaveChanges" class="saveRow'">
                </form>


            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div>
        @endsection
        @include('layouts.partials._js')
        @section('js')
            <script>
                var counter = 1;
                $('.btnAdd').on('click', '.addRow', function() {
                    var row = `<tr>
        <td>${counter++}</td>
                <td>
                    <select name="lang_name[]" id="lang_name" class="form-control">
                        @foreach (config('translatable.supportedLocales') as $key => $item)
                            <option  value="{{ $item['lang_name'] }}" data-native="{{ $item['lang_native'] }}" data-local="{{ $item['lang_local'] }}">{{ $item['lang_name'] }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" id="lang_local" name="lang_local[]" class="form-control">
                </td>
                <td>
                    <input type="text" id="lang_native" name="lang_native[]" class="form-control">
                </td>
                <th> <a href="javascript:void(0)" class="btn btn-danger delRow">Del</a></th>
            </tr>`
                    $('tbody').append(row);
                });

                $('tbody').on('click', '.delRow', function() {
                    $(this).parent().parent().remove();
                });



                $('tbody').on('change', 'tr', function() {
                    var natvies = $('tbody #lang_native')
                    var local = $('tbody #lang_local')
                    natvies[$(this).index()].value = $(this).find('option:selected').data('native');
                    local[$(this).index()].value = $(this).find('option:selected').data('local');
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $('#formLocal').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "{{ route('settings.store') }}",
                        type: "POST",
                        data: $(this).serialize(),

                        success: function(data) {
                            console.log(data.headers);
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr);
                        }
                    });

                })
            </script>
        @endsection
