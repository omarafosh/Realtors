@extends('layouts.master')

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="row mt-2 ml-2">


                <div class="alert alert-danger" >
                    <ul class="validate_errors">

                    </ul>
                </div>

                <div class="btnAdd col-xs-3">
                    <a href="javascript:void(0)" class="btn btn-success form-control addRow">Add</a>
                </div>

            </div>
            <div class="box-body">
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
                            </tbody>
                        </table>
                        <div class="btnAdd col-xs-3 mt-2">
                            <input type="submit" value="SaveChanges" class="btn btn-success form-control saveRow'">
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

                $('#formLocal').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "{{ route('settings.store') }}",
                        type: "POST",
                        data: $(this).serialize(),
                        success: function(data) {
                             console.log(data);
                        },
                        error: function(data) {
                            var response=(data.responseJSON);
                            var err=`<li>${response.errors['lang_name']}</li>`
                            $('.validate_errors').html('');
                             $('.validate_errors').append(err);
                             console.log(response.errors);
                             $('alert').show();
                        },
                    });
                })

            </script>
        @endsection
