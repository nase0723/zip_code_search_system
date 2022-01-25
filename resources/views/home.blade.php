@extends('layouts.layout')

@section("css_link")
    <link rel="stylesheet" href="{{ asset('/css/home.css') }}">
@endsection

@section("content")
    <div class="container">
        <a href="{{ url()->current() }}/search_by_zip_code" class="btn-animation-02"><span>郵便番号から住所を検索<span></a>
    </div>
    <br>
    <br>
    <div class="container">
        <a href="{{ url()->current() }}/search_by_address" class="btn-animation-02"><span>住所から郵便番号を検索<span></a>
    </div>
@endsection

