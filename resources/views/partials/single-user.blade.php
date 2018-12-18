
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @foreach ($member as $u)
                    <div class="card-header">
                        <span class="user-details">Username: {{ $u['username'] }}</span>
                        <span class="user-details">Email: {{ $u['email'] }}</span>
                        @if (isSet($u['contact']))
                            <span class="user-details">Contact: {{ $u['contact'] }}</span>
                        @endif
                    </div>
                @endforeach

                <div class="card-body">
                    <div class="user-ads">
                        @if (isSet($ads))
                            @include('partials.ads-tab')
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-light" href="{{ url()->previous() }}">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
