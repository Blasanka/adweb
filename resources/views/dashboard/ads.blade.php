@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Dashboard
                    <ul class="nav nav-tabs"  id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="ads-tab" data-toggle="tab" href="{{route('dashboard.ads')}}" role="tab" aria-controls="ads" aria-selected="true">Ads<span class="badge">23</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="users-tab" data-toggle="tab" href="{{route('dashboard.users')}}" role="tab" aria-controls="users" aria-selected="true">Users<span class="badge">3</span></a>
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
                <div class="card-footer">{{ '77 Ads' }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
