@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-3">
            <label for="">Select The Default Language</label>
            <select name="default-local" id="default-local" class="form-control">
                @foreach (config('translatable.supportedLocales') as $key => $item)
                    <option id="{{ $key }}" value="{{ $item['local'] }}" native="{{ $item['native'] }}">
                        {{ $item['name'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row m-10">
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
                 


                </tbody>
            </table>
            <input type="submit" value="SaveChanges" class="saveRow'">
        </form>


    </div>
@endsection
@include('layouts.partials._js')
@section('js')
    <script>
        var counter = 1;
        $('.btnAdd').on('click', '.addRow', function() {
            var row = `<tr>
                <td>${counter++}</td>
                        <td>
                            <select name="lang[]" id="lang" class="form-control">
                                @foreach (config('translatable.supportedLocales') as $key => $item)
                                    <option  value="{{ $item['local'] }}" data-native="{{ $item['native'] }}" data-name="{{ $item['name'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" id="local" name="local[]" class="form-control">
                        </td>
                        <td>
                            <input type="text" id="native" name="native[]" class="form-control">
                        </td>
                        <th> <a href="javascript:void(0)" class="btn btn-danger delRow">Del</a></th>
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
            local[$(this).index()].value = $(this).find('option:selected').val();
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
                error: function(data, status, error) {

                }
            });

        })
    </script>
@endsection
