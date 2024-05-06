@extends('layouts.app')
@section('content')
    <div class="chatMain">

        <div class="card">
            <div class="row no-gutters">
                <div class="col-xxl-3 col-xl-4 col-md-5 box-col-5">
                    <div class="left-sidebar-wrapper">
                        <div class="left-sidebar-chat">
                            <div class="input-group"><span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search search-icon text-gray">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                                <input class="form-control" type="text" placeholder="Search here..">
                            </div>
                        </div>
                        <div class="advance-options">
                            <ul class="nav border-tab" id="chat-options-tab" role="tablist">
                                <li class="nav-item" role="presentation"><a class="nav-link f-w-600 active" id="chats-tab"
                                        data-bs-toggle="tab" href="#chats" role="tab" aria-controls="chats"
                                        aria-selected="true">Chats</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link f-w-600" id="contacts-tab"
                                        data-bs-toggle="tab" href="#contacts" role="tab" aria-controls="contacts"
                                        aria-selected="false" tabindex="-1">Contacts</a></li>
                            </ul>
                            <div class="tab-content" id="chat-options-tabContent">
                                <div class="tab-pane fade active show" id="chats"
                                    role="tabpanel"aria-labelledby="chats-tab">
                                    <div class="common-space">
                                        <p>Recent chats</p>
                                        <div class="header-top">
                                            <a class="btn badge-light-primary f-w-500" href="#!">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="leftchatBar">
                                        <ul class="chats-user">
                                            @foreach ($get_chats as $get_chat)
                                                @php
                                                    if ($get_chat->reciver_id == Auth::user()->id) {
                                                        $contact_details = App\Models\User::where(
                                                            'id',
                                                            $get_chat->sender_id,
                                                        )->first();
                                                    } else {
                                                        $contact_details = App\Models\User::where(
                                                            'id',
                                                            $get_chat->reciver_id,
                                                        )->first();
                                                    }
                                                @endphp
                                                <a href="{{ route('chat.conversation', [$get_chat->id, $contact_details->f_name]) }}"
                                                    class="col-12">
                                                    <li class="common-space">
                                                        <div class="chat-time">
                                                            <div class="active-profile">
                                                                <img class="img-fluid rounded-circle"
                                                                    src="{{ asset($contact_details->profile_avatar) }}"
                                                                    alt="user">
                                                                <div class="status bg-success"></div>
                                                            </div>
                                                            <div>
                                                                <span>{{ $contact_details->f_name . ' ' . $contact_details->l_name }}</span>
                                                                <p>{{ $get_chat->last_msg }}</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p>{{ $get_chat->created_at->diffForHumans() }} </p>
                                                            <div class="badge badge-light-success">
                                                                @if ($get_chat->is_read == 0)
                                                                    {{ $get_chat->count() }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </li>
                                                </a>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-9 col-xl-8 col-md-7 box-col-7">
                    <div class="right-sidebar-chat">
                        <div class="right-sidebar-title">
                            <div class="common-space">
                                <div class="chat-time">
                                    <div class="active-profile">
                                        <img class="img-fluid rounded-circle"
                                            src="{{ asset($get_user_details->profile_avatar) }}" alt="user">
                                        <div class="status bg-success"></div>
                                    </div>
                                    <div><span
                                            class="f-w-500">{{ $get_user_details->f_name . ' ' . $get_user_details->l_name }}</span>
                                        <p id="active_status">Online</p>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <div class="contact-edit chat-alert"><i class="fal fa-info-circle"></i>
                                    </div>
                                    <div class="contact-edit chat-alert">
                                        <svg class="dropdown-toggle" role="menu" data-toggle="dropdown"
                                            aria-expanded="false">
                                            <use href="assets/svg/icon-sprite.svg#menubar"></use>
                                        </svg>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                            <a class="dropdown-item" href="#!">View details</a>
                                            <a class="dropdown-item" href="#!">Send messages</a>
                                            <a class="dropdown-item" href="#!">Add to favorites</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-sidebar-Chats">
                            <div class="msger">
                                <div class="msgrChatScroll mCustomScrollbar _mCS_3">
                                    <div id="mCSB_3"
                                        class="mCustomScrollBox mCS-inset-3-dark mCSB_vertical mCSB_inside"
                                        style="max-height: none;" tabindex="0">
                                        <div id="mCSB_3_container" class="mCSB_container"
                                            style="position:relative; top:0; left:0;" dir="ltr">
                                            <div class="msger-chat" id="message-container">

                                            </div>
                                        </div>
                                        <div id="mCSB_3_scrollbar_vertical"
                                            class="mCSB_scrollTools mCSB_3_scrollbar mCS-inset-3-dark mCSB_scrollTools_vertical"
                                            style="display: block;">
                                            <div class="mCSB_draggerContainer">
                                                <div id="mCSB_3_dragger_vertical" class="mCSB_dragger"
                                                    style="position: absolute; min-height: 30px; display: block; height: 263px; max-height: 590px; top: 0px;">
                                                    <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                                                </div>
                                                <div class="mCSB_draggerRail"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form class="msger-inputarea" enctype="multipart/form-data" id="send_container_messge">
                                    <input type="hidden" id="token" value="{{ csrf_token() }}">
                                    <div class="dropdown-form dropdown-toggle" role="main" data-bs-toggle="dropdown"
                                        aria-expanded="false"><i class="fal fa-plus"></i>
                                        <div class="chat-icon dropdown-menu dropdown-menu-start">
                                            <div class="dropdown-item mb-2">
                                                <svg>
                                                    <use href="assets/svg/icon-sprite.svg#camera">
                                                    </use>
                                                </svg>
                                            </div>
                                            <div class="dropdown-item">
                                                <svg>
                                                    <use href="assets/svg/icon-sprite.svg#attchment">
                                                    </use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <input class="msger-input two uk-textarea" type="text"
                                        placeholder="Type Message here.." name="message" id="message">
                                    <div class="open-emoji">
                                        <div class="second-btn uk-button"></div>
                                    </div>
                                    <button class="msger-send-btn" type="submit"><i
                                            class="fas fa-location-arrow"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        let auth_id = {{ auth()->user()->id }};
        let read_time = 0; // Initialize read time

        // Function to send AJAX request to update read time
        function updateReadTime() {
            $.ajax({
                type: "POST",
                url: "{{ route('chat.updates_online_status') }}",
                data: {
                    status: 0,
                    auth_id: auth_id,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    console.log("Read time updated successfully");
                },
                error: function(xhr, status, error) {
                    console.error("Error updating read time:", error);
                }
            });
        }

        // Track time spent on the page and update read time every minute
        let timer = setInterval(function() {
            read_time += 1;
        }, 60000); // Update read time every minute (60000 milliseconds)

        // Update read time before leaving the page
        $(window).on('beforeunload', function() {
            clearInterval(timer); // Stop the timer
            updateReadTime(); // Update read time
        });

        function getUserStatus() {
            $.ajax({
                type: "POST",
                url: "{{ route('chat.getActiveStatus') }}",
                data: {
                    status: 0,
                    contact_id: '{{ $get_user_details->id }}',
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    if (response.status == 1) {
                        $('#active_status').html('Online');
                    } else {
                        $('#active_status').html('Offline');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error updating read time:", error);
                }
            });
        }
        // setInterval(getUserStatus, 10000);
    </script>
    <script>
        // Add record
        $('#send_container_messge').submit(function(e) {
            e.preventDefault();
            var form = new FormData(document.getElementById('send_container_messge'));
            var token = $('#token').val();
            form.append('_token', token);
            var x = document.getElementById("myAudio");

            $.ajax({
                url: '{{ route('chat.send_message', $id) }}',
                type: 'post',
                data: form,
                cache: false,
                contentType: false, //must, tell jQuery not to process the data
                processData: false,

                success: function(response) {
                    document.getElementById("send_container_messge").reset();

                    $("#messageBody").animate({
                        scrollTop: $('#messageBody').get(0).scrollHeight
                    }, 0);
                }
            });
        });
        var reff = firebase.database().ref("user_id_{{ auth()->user()->id }}/messages/user_id_{{ $id }}");
        reff.on('child_added', function(snapshot) {
            var AuthName = '{{ auth()->user()->id }}'
            var myname = "{{ Auth::user()->name }}";
            var name = snapshot.val().user_id;
            var image_tag = "";

            if (snapshot.val().file == "") {
                image_tag = "";
            } else if (snapshot.val().file_type == "image") {

                image_tag = '<a class="popup-media" href="{{ asset('/message_media') }}/' + snapshot.val()
                    .files +
                    '"><img class="img-fluid rounded" src="{{ asset('/message_media') }}/' + snapshot.val()
                    .files +
                    '"></a>';
            } else if (snapshot.val().file_type == "video") {
                image_tag =
                    '<div class="document"><div class="btn btn-primary btn-icon rounded-circle text-light mr-2"><svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg></div><div class="document-body"><h6><a href="#" class="text-reset" title="' +
                    snapshot.val().files + '">' + snapshot.val().files + '</a></h6></div></div>';
            } else if (snapshot.val().file_type == "document") {
                var recent_docs =
                    '<li class="list-group-item"><div class="document"><div class="btn btn-primary btn-icon rounded-circle text-light mr-2"><svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg> </div><div class="document-body"><h6 class="text-truncate"><a href="#" class="text-reset" title="' +
                    snapshot.val().files + '">' + snapshot.val().files +
                    '</a></h6><ul class="list-inline small mb-0"><li class="list-inline-item"><span class="text-muted text-uppercase">docs</span></li></ul></div><div class="document-options ml-1"><div class="dropdown"><button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg> </button><div class="dropdown-menu"><a class="dropdown-item" href="{{ asset('/message_media') }}/' +
                    snapshot.val().files + '" download="{{ asset('/message_media') }}/' + snapshot.val().files +
                    '">Download</a></div></div></div></div></li>';
                image_tag =
                    '<div class="document"><div class="btn btn-primary btn-icon rounded-circle text-light mr-2"><svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg></div><div class="document-body"><h6><a href="#" class="text-reset" title="' +
                    snapshot.val().files + '">' + snapshot.val().files + '</a></h6></div></div>';
            }
            if (name == AuthName) {
                var block =
                    '<div class="msg right-msg"><div class="-img"style="mmsgargin: 0 0 0 10px; background-image: url({{ asset(auth()->user()->profile_avatar) }}); width: 33px;height: 33px;"></div><div class="msg-bubble"><div class="msg-info"><div class="msg-info-name">{{ auth()->user()->f_name . ' ' . auth()->user()->l_name }}</div><div class="msg-info-time">' +
                    snapshot.val().date + '</div></div><div class="msg-text">' + snapshot.val().text +
                    '</div><br><div class="msg-text">' + image_tag + '</div></div></div>';
                $("#message-container").append(block);
                window.scrollTo(0, document.body.scrollHeight);
            } else {
                var block2 =
                    '<div class="msg left-msg"><div class="msg-img" style="margin: 0 0 0 10px; background-image: url({{ asset($get_user_details->profile_avatar) }}); width: 33px;height: 33px;"></div><div class="msg-bubble"><div class="msg-info"><div class="msg-info-name">{{ $get_user_details->f_name . ' ' . $get_user_details->l_name }}</div><div class="msg-info-time">' +
                    snapshot.val().date +
                    '</div></div><div class="msg-text">' + snapshot.val().text +
                    '</div><br><div class="msg-text">' + image_tag + '</div></div></div>';
                $("#message-container").append(block2);
                window.scrollTo(0, document.body.scrollHeight);
            }
        });
    </script>
@endpush
