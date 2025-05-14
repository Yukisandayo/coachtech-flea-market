@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{asset('css/purchase.css')}}">
@endsection

@section('content')
<div class="purchase content">
    <livewire:purchase-form :product="$product" />
</div>
@endsection