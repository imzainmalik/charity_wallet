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
                                 <li class="nav-item" role="presentation"><a class="nav-link f-w-600" id="chats-tab"
                                         data-bs-toggle="tab" href="#chats" role="tab" aria-controls="chats"
                                         aria-selected="true">Chats</a></li>
                                 {{-- <li class="nav-item" role="presentation"><a class="nav-link f-w-600" id="contacts-tab"
                                         data-bs-toggle="tab" href="#contacts" role="tab" aria-controls="contacts"
                                         aria-selected="false" tabindex="-1">Contacts</a></li> --}}
                             </ul>
                             <div class="tab-content" id="chat-options-tabContent">
                                 <div class="tab-pane fade active show" id="chats" role="tabpanel"
                                     aria-labelledby="chats-tab">
                                     <div class="common-space">
                                         <p>Recent chats</p>
                                         <div class="header-top"><a class="btn badge-light-primary f-w-500"
                                                 href="#!"><i class="fas fa-plus"></i></a>
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
                                                             <div class="active-profile"><img
                                                                     class="img-fluid rounded-circle"
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
                         <center>
                             <h1 style="margin-top: 350px;">Click to start conversation</h1>
                         </center>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     </div>
 @endsection
