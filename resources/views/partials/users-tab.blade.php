
<div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
    <ul class="list-group">
        @foreach ($users as $user)
            <li class="list-group-item">
                <a href="#" class="card-link">
                    <h4>{{ $user['username'] }}</h4>
                    <p>{{ $user['email'] }}</p>
                </a>
                
                <div class="collapse" id="a{{$user['email']}}">
                    <div class="item-footer">
                        <span>Manage this user: &nbsp;</span>
                        <span class="edit-item">
                            EDIT  <i class="fas fa-edit"></i>
                        </span>
                        <span class="delete-item">
                            DELETE  <i class="fas fa-trash-alt"></i>
                        </span>
                        <span class="edit-item">
                            DISABLE  <i class="fas fa-edit"></i>
                        </span>
                    </div>
                </div>
                <a data-toggle="collapse" href="#a{{$user['email']}}" role="button" aria-expanded="false" aria-controls="a{{$user['email']}}">
                    <span class="mr-3"></span>
                    <span class="">Manage</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>
