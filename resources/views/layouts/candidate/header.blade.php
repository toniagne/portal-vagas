<!doctype html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="base" content="{{ config('app.url') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    @stack('style')
</head>


