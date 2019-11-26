@if('_lib')
@foreach($_lib as $key => $library)
@include("layouts.includes.$library")
@endforeach
@endif
