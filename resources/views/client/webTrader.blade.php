@extends('client.layouts.main')
@section('title', Lang::get('dashboard.PageTitle'))
@section('content')

    <iframe src="{{config('fxweb.LinkTradeForUser')}}" allowfullscreen="allowfullscreen"
            style="width: 100%; height: 700px; border: none"></iframe>
@stop


