
{{-- <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab"> --}}
    <ul class="list-group">
        @foreach ($users as $user)
            @if ($user['email'] != 'premadasa.office@gmail.com')
                <li class="list-group-item">
                    <a href="{{ route('dashboard.show', ['user' => $user['email']]) }}" class="card-link">
                        <h4>{{ $user['username'] }}</h4>
                        <p>{{ $user['email'] }}</p>
                    </a>

                    <div class="collapse" id="a{{$user['username']}}">
                        <div class="item-footer">
                            <span>Manage this user: &nbsp;</span>
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
                            <a href="#">
                                <span class="btn disable-enable">
                                    DISABLE
                                </span>
                            </a>
                        </div>
                    </div>
                    <a data-toggle="collapse" href="#a{{$user['username']}}" role="button" aria-expanded="false" aria-controls="a{{$user['username']}}">
                        <span class="caret">Manage</span> <i class="fas fa-external-link-square-alt"></i>
                        <span class="mr-3"></span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
{{-- </div> --}}
