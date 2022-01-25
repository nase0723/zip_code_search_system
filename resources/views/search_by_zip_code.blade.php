@extends('layouts.layout')

@section("css_link")
    <link rel="stylesheet" href="{{ asset('/css/search_by_zip_code.css') }}">
@endsection

<?php 
function check_value_exist($array, $column) {
    foreach ($array as $value):
        if ($value->$column) return true;
    endforeach;
    return false;
}
?>

@section("content")
    <form action="{{ route('search_by_zip_code') }}" method="post" class="input_form">
        @csrf
        <p>郵便番号</p>
        <input type="text" name="zip_code" value="{{ $zip_code }}" >
        <div>
            <button type="submit" name="btn_search">検索</button>
        </div>
    </form>
    <div>
        <br>
        <br>
        @isset ($results)
            <table border="1">
                <thead>
                    <tr>
                        @if (check_value_exist($results, "ken_name"))<th>県名</th> @endif
                        @if (check_value_exist($results, "city_name"))<th>市名</th>@endif
                        @if (check_value_exist($results, "town_name"))<th></th>@endif
                        @if (check_value_exist($results, "block_name"))<th></th>@endif
                        @if (check_value_exist($results, "office_name"))<th>建物名</th>@endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $value)
                        <tr>
                            @if (check_value_exist($results, "ken_name"))<td>{{ $value->ken_name }}</td>@endif
                            @if (check_value_exist($results, "city_name"))<td>{{ $value->city_name }}</td>@endif
                            @if (check_value_exist($results, "town_name"))<td>{{ $value->town_name }}</td>@endif
                            @if (check_value_exist($results, "block_name"))<td>{{ $value->block_name }}</td>@endif
                            @if (check_value_exist($results, "office_name"))<td>{{ $value->office_name }}</td>@endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endisset
    </div>
@endsection


