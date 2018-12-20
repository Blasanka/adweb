
{{-- <div class="tab-pane fade show active" id="ads" role="tabpanel" aria-labelledby="ads-tab"> --}}
    <ul class="list-group">
        @foreach ($ads as $ad)
            <li class="list-group-item">
                <a href="{{ route('dashboard.ad.show', ['ad' => $ad['title']]) }}" class="card-link">
                    <h4 style="display: inline;">{{ $ad['title'] }}</h4>
                    @if (!empty($ad['disabled']))
                        @if ($ad['disabled'])
                            &nbsp;<span style="color: red;"><i class="fas fa-ban"></i> DISABLED</span>
                        @endif
                    @endif
                    <p>{{ $ad['description'] }}</p>
                </a>

                <div class="collapse" id="a{{$ad['contact']}}">
                    <div class="item-footer">
                        <span>Manage this ad: &nbsp;</span>
                        <a href="#">
                            <span class="btn edit-item">
                                EDIT  <i class="fas fa-edit"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="btn delete-item">
                                DELETE  <i class="fas fa-trash-alt"></i>
                            </span>
                        </a>
                        {{-- {{ route('dashboard.ad.disable', ['ad' => $ad['title']]) }} --}}
                        <a href="#">
                            <span class="btn disable-enable">
                                DISABLE
                            </span>
                        </a>
                    </div>
                </div>
                <a data-toggle="collapse" href="#a{{$ad['contact']}}" role="button" aria-expanded="false" aria-controls="a{{$ad['contact']}}">
                    <span class="caret">Manage</span>
                    <span class="mr-3"></span>
                </a>
            </li>
        @endforeach
    </ul>
{{-- </div> --}}
