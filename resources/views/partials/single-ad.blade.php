
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @foreach ($ad as $a)
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                {{ $a['title'] }}
                            </div>
                            <div class="col-md-3 manage-user">
                                @if (!empty($a['disabled']))
                                    @if ($a['disabled'])
                                        <a class="nav-link enabled" href="{{ route('dashboard.ads.title', ['title' => $a['title']]) }}"><i class="fas fa-toggle-on"></i> ENABLE</a>
                                    @else
                                        <a class="nav-link disabled" href="{{ route('dashboard.ads.title', ['title' => $a['title']]) }}"><i class="fas fa-ban"></i> DISABLE</a>
                                    @endif
                                @elseif (empty($a['disabled']))
                                    <a class="nav-link disabled" href="{{ route('dashboard.ads.title', ['title' => $a['title']]) }}"><i class="fas fa-ban"></i> DISABLE</a>
                                @endif
                                <a class="nav-link" href="{{route('dashboard.users')}}"><i class="fas fa-trash-alt"></i> DELETE</a>
                            </div>
                        </div>
                    </div>
                    <div class="row ad-image-row">
                        @foreach ($a['imageUrl'] as $img)
                            <div class="col-md-2">
                                <div class="card">
                                    <img class="card-img-top" src="{{ $img }}" alt="ads" width="100" height="100">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-body">
                        <div class="ad-details">
                            <p>
                                {{ $a['description'] }}
                            </p>
                            <p>
                                {{ $a['contact'] }}
                            </p>
                            <p>
                                {{ $a['email'] }}
                            </p>
                            <h4>
                                Rs. {{ $a['price'] }}
                            </h4>
                        </div>
                    </div>
                @endforeach
                <div class="card-footer">
                    <a class="user-detais btn btn-light" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
