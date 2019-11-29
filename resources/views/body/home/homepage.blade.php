@extends('layouts.master_body')

@section('title'){{ (isset($title)) ? $title : (config('app_handler.app_name') . ' | Homepage') }}@endsection

@section('header')
@endsection

@section('title_bar')
@endsection

@section('content_body')

@endsection

@section('footer')
<script>
    //
</script>
@endsection
