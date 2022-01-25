@extends('layouts.layout')

@section("css_link")
    <link rel="stylesheet" href="{{ asset('/css/search_by_address.css') }}">
@endsection

@section("content")
<div id="app" v-cloak>
    <form action="{{ route('search_by_address') }}" method="post">
        @csrf
        <h2>検索条件</h2>
        <div class="flex">
            <p class="col_1">県名</p>
            <p class="col_2">
                <input type="text" name="ken_name" value="{{ old('ken_name', isset($_POST['ken_name']) ? $_POST['ken_name'] : '') }}">
            </p>
        </div>
        <div class="flex">
            <p class="col_1">市名</p>
            <p class="col_2">
                <input type="text" name="city_name" value="{{ old('city_name', isset($_POST['city_name']) ? $_POST['city_name'] : '') }}">
            </p>
        </div>
        <div class="flex">
            <p class="col_1">町名</p>
            <p class="col_2">
                <input type="text" name="town_name" value="{{ old('town_name', isset($_POST['town_name']) ? $_POST['town_name'] : '') }}">
            </p>
        </div>
        <div class="flex">
            <p class="col_1">建物名</p>
            <p class="col_2">
                <input type="text" name="office_name" value="{{ old('office_name', isset($_POST['office_name']) ? $_POST['office_name'] : '') }}">
            </p>
        </div>
        <br>
        <button type="submit" name="btn_submit">検索</button>
    </form>
    <br>
    <br>
    @isset($results)
        <table>
            <thead>
                <tr>
                    @if($_POST['ken_name'])<th>県名</th>@endif
                    @if($_POST['city_name'])<th>市名</th>@endif
                    @if($_POST['town_name'])<th>町名</th>@endif
                    @if($_POST['office_name'])<th>建物名</th>@endif
                    <th>郵便番号</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $value)
                    <tr>
                        @if($_POST['ken_name'])<td>{{ $value->ken_name }}</td>@endif
                        @if($_POST['city_name'])<td>{{ $value->city_name }}</td>@endif
                        @if($_POST['town_name'])<td>{{ $value->town_name }}</td>@endif
                        @if($_POST['office_name'])<td>{{ $value->office_name }}</td>@endif
                        <td>{{ $value->zip }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endisset
    @isset($error) 
        {{ $error }}
    @endisset
</div>
<script src="{{ asset('js/search_by_address.js') }}"></script>
@endsection
