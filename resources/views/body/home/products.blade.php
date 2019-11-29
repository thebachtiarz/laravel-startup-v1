@extends('layouts.master_body')

@section('title'){{ (isset($title)) ? $title : (config('app_handler.app_name') . ' | Products') }}@endsection

@section('header')
<link rel="stylesheet" href="{{ online_asset() }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endsection

@section('title_bar')
@endsection

@section('content_body')
<div class="" id="view-doc-control"><button class="btn btn-info btn-sm text-bold text-capitalize addProduct"><i class="fas fa-plus fa-sm"></i>&ensp;add product</button></div>
<div class="mt-2" id="view-doc-products"></div>
<div class="mt-2" id="view-modify-product" style="display: none;"></div>
@endsection

@section('footer')
<script src="{{ online_asset() }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ online_asset() }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
@include('layouts.libraries._libraries', ['_lib' => ['_jquery_easing', '_sweetalert2']])
<script src="/js/app/body/home/doc-products.min.js"></script>
@endsection
