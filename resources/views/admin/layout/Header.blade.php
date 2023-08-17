<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle waves-effect" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <i class="mdi mdi-bell-outline noti-icon"></i>
                <span class="badge badge-pink rounded-circle noti-icon-badge">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="font-16 m-0">
                <span class="float-right">
                  <a href="" class="text-dark">
                    <small>Clear All</small>
                  </a> </span>Notification
                    </h5>
                </div>

                <div class="slimscroll noti-scroll">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon">
                            <i class="mdi mdi-comment-account-outline text-info"></i>
                        </div>
                        <p class="notify-details">
                            Caleb Flakelar commented on Admin
                            <small class="noti-time">1 min ago</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon text-success">
                            <i class="mdi mdi-account-plus text-primary"></i>
                        </div>
                        <p class="notify-details">
                            New user registered.
                            <small class="noti-time">5 hours ago</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon text-danger">
                            <i class="mdi mdi-heart text-danger"></i>
                        </div>
                        <p class="notify-details">
                            Carlos Crouch liked
                            <small class="noti-time">3 days ago</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon text-warning">
                            <i class="mdi mdi-comment-account-outline text-primary"></i>
                        </div>
                        <p class="notify-details">
                            Caleb Flakelar commented on Admi
                            <small class="noti-time">4 days ago</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon text-purple">
                            <i class="mdi mdi-account-plus text-danger"></i>
                        </div>
                        <p class="notify-details">
                            New user registered.
                            <small class="noti-time">7 days ago</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon text-danger">
                            <i class="mdi mdi-heart text-danger"></i>
                        </div>
                        <p class="notify-details">
                            Carlos Crouch liked <b>Admin</b>.
                            <small class="noti-time">Carlos Crouch liked</small>
                        </p>
                    </a>
                </div>

                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center notify-item notify-all">
                    See all notifications
                </a>
            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <img src="{{asset('assets\images\users\avatar-1.jpg')}}" alt="user-image" class="rounded-circle"/>
                <span class="pro-user-name ml-1">
              {{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i>
            </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-outline"></i>
                    <span>Profile</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout-variant"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" method="POST" action="{{route('logout')}}">
                    @csrf
                </form>
            </div>
        </li>

        <li class="dropdown notification-list">
            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                <i class="mdi mdi-settings-outline noti-icon"></i>
            </a>
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="index.html" class="logo text-center logo-dark">
          <span class="logo-lg">
            <img src="{{asset('assets\images\logo-dark.png')}}" alt="" height="18"/>
              <!-- <span class="logo-lg-text-dark">Velonic</span> -->
          </span>
            <span class="logo-sm">
            <!-- <span class="logo-lg-text-dark">V</span> -->
            <img src="{{asset('assets\images\logo-sm.png')}}" alt="" height="22"/>
          </span>
        </a>

        <a href="index.html" class="logo text-center logo-light">
          <span class="logo-lg">
            <img src="{{asset('assets\images\logo-light.png')}}" alt="" height="18"/>
              <!-- <span class="logo-lg-text-dark">Velonic</span> -->
          </span>
            <span class="logo-sm">
            <!-- <span class="logo-lg-text-dark">V</span> -->
            <img src="{{asset('assets\images\logo-sm.png')}}" alt="" height="22"/>
          </span>
        </a>
    </div>

    <!-- LOGO -->

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>
        <div class="page-title-right">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
        </div>
    </ul>
</div>
<script>
    $(document).ready(function () {
        $("#btn_logout").click(function (e) {
            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to sign out?!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, i want!",
            }).then((result) => {
                if (result.value) {
                    window.location.href = href;
                }
            });
        });
    });
</script>
