@extends('master')
@section('content')
<div class="container">
    <h1 class="text-center"> Asset Images </h1>
@php 
$assetid = $catdata;
@endphp
    @foreach($assetimages as $images)
        @if($assetid == $images->asset_id)
        <div class="container" style="float:left;width: 25%;padding: 10px;">
            <img src="{{asset('/uploads/'.$images->image)}}" width=200 height=200 />
        </div>
        @endif
    @endforeach
</div>
@endsection
