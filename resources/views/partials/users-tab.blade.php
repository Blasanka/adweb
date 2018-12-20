
{{-- <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab"> --}}
    <ul class="list-group">
        @foreach ($users as $u)
            @if ($u['email'] != 'premadasa.office@gmail.com')
                <li class="list-group-item">
                    <a href="{{ route('dashboard.user.show', ['user' => $u['email']]) }}" class="card-link">
                        <h4 style="display: inline;">{{ $u['username'] }}</h4>
                        @if (!empty($u['disabled']))
                            @if (!$u['disabled'])
                                &nbsp;</i><span style="color: red;"><i class="fas fa-ban"></i> DISABLED</span>
                            @endif
                        @endif
                        <p>{{ $u['email'] }}</p>
                    </a>

                    <div class="collapse" id="a{{$u['username']}}">
                        <div class="item-footer">
                            <span>Manage this user: &nbsp;</span>
                            <a href="#">
                                <span class="btn edit-item">
                                    EDIT  <i class="fas fa-edit"></i>
                                </span>
                            </a>
                            @if (!empty($memberMetadata))
                                <a href="{{route('dashboard.users.delete', ['uid' => $memberMetadata->uid])}}">
                                    <span class="btn delete-item">
                                        DELETE <i class="fas fa-trash-alt"></i>
                                    </span>
                                </a>
                                <a href="{{ route('dashboard.users.userid', ['uid' => $memberMetadata->uid]) }}">
                                    <span class="btn disable-enable">
                                        DISABLE
                                    </span>
                                </a>
                            @endif
                        </div>
                    </div>
                    <a data-toggle="collapse" href="#a{{$u['username']}}" role="button" aria-expanded="false" aria-controls="a{{$u['username']}}">
                        <span class="caret">Manage</span> <i class="fas fa-external-link-square-alt"></i>
                        <span class="mr-3"></span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
{{-- </div> --}}
