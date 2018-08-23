@extends('layouts.app')

@section('content')
@if(Auth::user()->subscribed('main'))
<domains></domains>
<br>
<servers></servers>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Update Billing Info</div>

                <div class="card-body">
                  You must have a <a href="{{url('/account')}}">card on file</a> before you can purchase a domain!

                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
