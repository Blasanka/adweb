
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @foreach ($ad as $a)
                    <div class="card-header">
                        {{ $a['title'] }}
                    </div>
                    <div class="row">
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
            </div>
        </div>
    </div>
</div>
@endsection
