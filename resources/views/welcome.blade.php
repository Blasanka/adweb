@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    
                    {{-- <div class="title m-b-md">
                        AdWeb &#x1F915;
                    </div> --}}

                    {{-- <div class="links">
                    </div> --}}
                    <div class="card">
                        <div class="card-header">All Ads</div>
        
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            <ul class="list-group">
                                @foreach ($ads as $ad)
                                    <li class="list-group-item">
                                        <a href="#" class="card-link">
                                            <h4>{{ $ad['title'] }}</h4>
                                            <p>{{ $ad['description'] }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection