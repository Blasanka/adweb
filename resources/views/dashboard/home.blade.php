@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Dashboard
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="" href="{{route('dashboard.ads')}}">Ads<span class="badge">23</span></a>
                        </li>
                        <li class="list-inline-item">
                            <a class="" href="{{route('dashboard.users')}}">Users<span class="badge">3</span></a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @auth
                        {{-- {{ Auth::user()->name }} &#x1F63C; --}}
<<<<<<< HEAD
                        {{Session::get('user')}}
                    @endauth 
=======
                    @endauth
                    {{ $user->uid }}
>>>>>>> f84831e2a64af15656a8f3797b32d30cf62786f0
                </div>
                <div class="card-footer">Coming soon</div>
            </div>
        </div>
    </div>
</div>
@endsection
