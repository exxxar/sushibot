@extends('layouts.main')

@section('title', 'ISUSHI')

@section('content')
    @include("main.partials.search")
    @include("main.partials.header_top_bar")
    @include("main.partials.header_area")
    @include("main.partials.header_bg")
    @include("main.partials.header_slider")
    @include("main.partials.chopcafe_about")
    @include("main.partials.chopcafe_menu")
    @include("main.partials.how_to_order")
    @include("main.partials.chopcafe_chef")
    @include("main.partials.chopcafe_food_festival")
    @include("main.partials.chopcafe_testimonial")
    @include("main.partials.chopcafe_reservation")
    @include("main.partials.chopcafe_footer")
@endsection