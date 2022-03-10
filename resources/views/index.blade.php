@extends('layouts.master')
@section('title', '')
@section('content')
<div class="section-body">
ini isi content {{Auth::user()->name}}
</div>
@endsection
