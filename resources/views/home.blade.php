@extends('layouts.app')

@section('content')
@if(Auth::user()->subscribed('main'))
<domains></domains>
@else
You must have a <a href="{{url('/account')}}">card on file</a> before you can purchase a domain!
@endif

@endsection
