@extends('layouts.master_body')

@section('title'){{ (isset($title)) ? $title : (config('app_handler.app_name') . ' | Homepage') }}@endsection

@section('header')
@endsection

@section('title_bar')
@endsection

@section('content_body')

@endsection

@section('footer')
<script async defer src="/js/app/master/credentials_checker.min.js"></script>
<script src="/js/app/body/home/homepage.min.js"></script>
<script>
    //
</script>
@endsection
