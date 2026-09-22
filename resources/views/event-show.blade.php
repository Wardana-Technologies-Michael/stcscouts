@extends('layouts.master')

@section('title', $event->title . " – 16th Colombo Scout Group")

@section('content')
    {!! $event->body !!}
@endsection
