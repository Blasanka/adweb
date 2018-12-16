
{{-- <div class="tab-pane fade show active" id="ads" role="tabpanel" aria-labelledby="ads-tab"> --}}
    <ul class="list-group">
        @foreach ($ads as $ad)
            <li class="list-group-item">
                <a href="#" class="card-link">
                    <h4>{{ $ad['title'] }}</h4>
                    <p>{{ $ad['description'] }}</p>
                </a>
                
                <div class="collapse" id="a{{$ad['contact']}}">
                    <div class="item-footer">
                        <span>Manage this ad: &nbsp;</span>
                        <span class="edit-item">
                            EDIT  <i class="fas fa-edit"></i>
                        </span>
                        <span class="delete-item">
                            DELETE  <i class="fas fa-trash-alt"></i>
                        </span>
                        <span class="disable-enable">
                            DISABLE
                        </span>
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