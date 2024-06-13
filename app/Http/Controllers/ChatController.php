<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\OnlineStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $get_chats = Chat::where('sender_id', auth()->user()->id)
            ->distinct('sender_id')
            ->orwhere('reciver_id', auth()->user()->id)
            ->orderBy('id', 'DESC')->get();
        // dd($get_chats);  
        return view('chat.index', get_defined_vars());
    }

    public function conversation($id, $name)
    {
        $get_chats = Chat::where('sender_id', auth()->user()->id)
            ->orwhere('reciver_id', auth()->user()->id)
            ->orderBy('id', 'DESC')->get();

        $get_user_details = User::findorfail($id);

        return view('chat.conversation', get_defined_vars());
    }
    public function send_message(Request $request, $id)
    {
        // dd($request->all());
        $user_details = User::findorfail($id);
        $chat_details = Chat::orwhere('sender_id', auth()->user()->id)->orwhere('reciver_id', auth()->user()->id)->get();
        // dd($chat_details);
        if ($request->hasFile('files')) {
            $attechment  = $request->file('files');
            $img_2 =  time() . $attechment->getClientOriginalName();
            $attechment->move(public_path('message_media'), $img_2);
            $image_name = explode('.', $img_2);
            $extention = end($image_name);
            $extention = Str::lower($extention);

            if ($extention == "png") {
                $type = 'image';
            } elseif ($extention == "jpg") {
                $type = 'image';
            } elseif ($extention == "mp4") {
                $type = 'video';
            } elseif ($extention == "jpeg") {
                $type = 'image';
            } else {
                $type = "document";
            }
            $has_file = 1;
        } else {
            $has_file = 0;
        }

        if ($chat_details->count() > 0) {
            $create_chat = new Chat();
            $create_chat->sender_id = auth()->user()->id;
            $create_chat->reciver_id = $id;
            $create_chat->last_msg = $request->message;
            $create_chat->file = $img_2 ?? '';
            $create_chat->has_file = $has_file;
            $create_chat->is_read = 1;
            $create_chat->save();
        }


        $this->send_message_to_user([
            'id' => $id,
            'file_type' => $type ?? '',
            'link' => '/chat-conversation/' . $id . '/' . $user_details->f_name . ' ',
            'message' => $request->message,
            'files' => $img_2 ?? '',
            'username' => $user_details->f_name . '' . $user_details->l_name
        ]);
    }

    public function updates_online_status(Request $request)
    {
        OnlineStatus::where('id', auth()->user()->id)->update(array(
            'user_id' => auth()->user()->id,
            'status' => $request->status
        ));
    }

    public function getActiveStatus(Request $request)
    {
        $check_exist = OnlineStatus::where('user_id', $request->contact_id)->first();

        if ($check_exist != null) {
            return response()->json([
                'status' => $check_exist->status,
            ]);
        } else {
            return response()->json([
                'error' => 'user not found'
            ]);
        }
    }
}
