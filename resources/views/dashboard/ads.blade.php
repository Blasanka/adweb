@extends('layouts.app')

@section('content')
@if (isSet($ads))
    @php ($adsCount = sizeOf($ads))
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Dashboard
                    <ul class="nav nav-tabs"  id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('dashboard.ads')}}">Ads<span class="badge">{{ $adsCount }}</span></a> <!--id="ads-tab" data-toggle="tab"  role="tab" aria-controls="ads" aria-selected="true"-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard.users')}}">Users</a>
                            {{-- <span class="badge">3</span><!-- id="users-tab" data-toggle="tab"  role="tab" aria-controls="users" aria-selected="true"--> --}}
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li> --}}
                    </ul>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (isSet($ads))
                        @include('partials.ads-tab')
                    @endif
                </div>
                <div class="card-footer">{{ $adsCount }} ads</div>
            </div>
        </div>
    </div>
</div>
@endsection
