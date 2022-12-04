<ul class="navbar-nav ml-auto nav-flex-icons" id="notification">
          <li class="nav-item avatar dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <span class="badge badge-danger ml-2">
                  @if($notification)
                  {{$notification->count()}}
                  @endif
                </span>
              <i class="fas fa-bell"></i>
            </a>
            @if($notification)
            <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5" id="refreshnotification" >
                  @foreach($notification as $n)
                  
                  <a class="dropdown-item waves-effect waves-light" href="/getlinknotification/{{$n->notification_id}}">{{$n->notificationName}} <span class="badge badge-danger ml-2">4</span></a>
                  @endforeach
                      @if( $notification->count() == 0)                          
                        <a class="dropdown-item waves-effect waves-light" href="#">No Notification Yet<span class="badge badge-danger ml-2">1</span></a>
                        @endif
                  @endif 
                                           
            </div>
          </li>
        </ul>



    
