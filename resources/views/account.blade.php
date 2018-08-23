@extends('layouts.app')

@section('content')
<billing last4="{{Auth::user()->card_last_four}}"></billing>
<br>
<keys></keys>
@endsection
