
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            @foreach ($member as $u)
                                <span class="user-details">Username: {{ $u['username'] }}</span>
                                <span class="user-details">Email: {{ $u['email'] }}</span>
                                @if (isSet($u['contact']))
                                    <span class="user-details">Contact: {{ $u['contact'] }}</span>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-3 manage-user">
                            @if (!empty($memberMetadata))
                                @if ($memberMetadata->disabled)
                                    <a class="nav-link enabled" href="{{ route('dashboard.users.userid', ['uid' => $memberMetadata->uid]) }}"><i class="fas fa-toggle-on"></i> ENABLE</a>
                                @else
                                    <a class="nav-link disabled" href="{{ route('dashboard.users.userid', ['uid' => $memberMetadata->uid]) }}"><i class="fas fa-ban"></i> DISABLE</a>
                                @endif
                                <a class="nav-link" href="{{route('dashboard.users.delete', ['uid' => $memberMetadata->uid])}}"><i class="fas fa-trash-alt"></i> DELETE</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="user-ads">
                        @if (isSet($ads))
                            @include('partials.ads-tab')
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <a class="user-detais btn btn-light" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Go Back</a>
                    @if (!empty($dates))
                        <span class="user-details">User registered at: {{ $dates['createdAt'] }}</span>
                        <span class="user-details">User last logged in at: {{ $dates['lastLoginAt'] }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
