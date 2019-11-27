@extends('layouts.master_body')

@section('title'){{ (isset($title)) ? $title : (config('app_handler.app_name') . ' | Homepage') }}@endsection

@section('header')
@endsection

@section('title_bar')
@endsection

@section('content_body')

@endsection

@section('footer')
<script src="/js/app/master/credentials_checker.min.js"></script>
<script>
    $(checkCredentials());
    // axios.get(`/api/doc-products`, {
    //     headers: {
    //         'Accept': 'application/json',
    //         'Authorization': `Bearer ${localStorage.getItem('_jwtApiToken')}`
    //     }
    // }).then(response => console.log(response.data)).catch(error => toastWarning(error));
</script>
@endsection
