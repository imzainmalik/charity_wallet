<div class="main-header">
    <div class="leftside">
        <div class="menu-Bar">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <h2 id="pageName">Dashboard</h2>
    </div>
    <div class="rightside">
        <div class="searchBoxMM">
            <div class="searchDv">
                <form action="">
                    <input type="text" placeholder="Search here..." required>
                    <button type="submit"><i class="fal fa-search"></i></button>
                </form>
            </div>
            <div class="mainSocialIco">
                <div class="items">
                    <button type="button" class="btn btn-primary position-relative">
                        <img src="{{ asset('assets/images/icons/notification.webp') }}" alt="">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
                            12
                        </span>
                    </button>
                </div>
                <div class="items">
                    <button type="button" class="btn btn-primary position-relative">
                        <img src="{{ asset('assets/images/icons/message.webp') }}" alt="">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                            85
                        </span>
                    </button>
                </div>
                <div class="items">
                    <button type="button" class="btn btn-primary position-relative">
                        <img src="{{ asset('assets/images/icons/schedule.webp') }}" alt="">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                            25
                        </span>
                    </button>
                </div>
            </div>
            <div class="profile-nav">
                <div class="media profile-media">
                    <img class="b-r-10" src="{{ asset(auth()->user()->profile_avatar) }}" alt=""style="width: 60px;">
                    <div class="media-body d-xl-block d-none box-col-none">
                        <div class="d-flex align-items-center gap-2"> <span>{{ auth()->user()->f_name }} </span><i
                                class="middle fa fa-angle-down"> </i></div>
                        <p class="mb-0 font-roboto">{{ auth()->user()->l_name }} </p>
                    </div>
                    <ul class="profile-dropdown onhover-show-div active">
                        <li>
                            <a href="user-profile.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('chat.home') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-mail">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <span>Inbox</span>
                            </a>
                        </li>
                        <li>
                            <a href="edit-profile.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-settings">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                    </path>
                                </svg>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li><a class="btn btn-pill btn-outline-primary btn-sm" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>