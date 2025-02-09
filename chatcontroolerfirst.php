<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\groups_messages;
use Illuminate\Http\Request;
use Pusher\Pusher;
use Illuminate\Validation\Rule;

class ChatController extends Controller
{
    public function index()
    {
        $messages_data = Message::where('firstuser',session()->get('chat_name'))->orWhere('seconduser',session()->get('chat_name'))->get();
        $checkarray=array();
        if($messages_data){
            foreach($messages_data as $msg){
            if(!in_array($msg->firstuser,$checkarray) || !in_array($msg->seconduser,$checkarray)){$checkarray[]=$msg->firstuser;$checkarray[]=$msg->seconduser;
            if($msg->firstuser==session()->get('chat_name')){
                $messages[]=array("chat_id"=>$msg->chat_id,"chatname"=>$msg->seconduser,"des"=>'New chat',"created_at"=>$msg->created_at,"firstuser"=>$msg->firstuser,"seconduser"=>$msg->seconduser,"message"=>$msg->message);
            }else{
                $messages[]=array("chat_id"=>$msg->chat_id,"chatname"=>$msg->firstuser,"des"=>'New chat',"created_at"=>$msg->created_at,"firstuser"=>$msg->firstuser,"seconduser"=>$msg->seconduser,"message"=>$msg->message);
            }}
        }
        }
        $gmessages = groups_messages::where('firstuser',session()->get('chat_name'))->get();
        $userdata = User::where('name',session()->get('chat_name'))->first();
        return view('chat', compact('messages','gmessages','userdata'));
    }
    public function chatdata(Request $request)
    {
        $chatid= $request->input('chatid');
        $Message = Message::where('chat_id',$chatid)->get();
        return response()->json(['data' => $Message]);
    }


    public function ustore(Request $request)
    {
        $request->validate([
            'fullName' => 'nullable|string|max:100',
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('users')->ignore($request->userid),
            ],
            'number' => 'required|string|size:10',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'country' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($request->userid);

        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->move(public_path('assets/img/profiles'), $fileName);
        } else {$fileName = $user->imgpath;}
        $user->update([
            'fullname' => $request->input('fullName'),
            'name' => $request->input('name'),
            'number' => $request->input('number'),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'country' => $request->input('country'),
            'imgpath' => $fileName,
        ]);
        return response()->json(['message' => 'User saved successfully!'], 200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'firstuser' => 'required|string|max:100',
            'seconduser' => 'required|string|max:100',
            'message' => 'required|string',
        ]);
        $chat_id=Message::where('firstuser',$request->firstuser)->where('seconduser',$request->seconduser)->value('chat_id');
       if(!$chat_id){$maxid=Message::max('chat_id')+1;}else{$maxid=$chat_id;}
       $message=Message::create(array_merge($request->all(),["chat_id" => $maxid]));

    $options = [
        'cluster' => env('PUSHER_APP_CLUSTER'),
        'useTLS' => true,
    ];
    $pusher = new Pusher(
        env('PUSHER_APP_KEY'),
        env('PUSHER_APP_SECRET'),
        env('PUSHER_APP_ID'),
        $options
    );
    $data = ['firstuser' => $message->firstuser,'seconduser' => $message->seconduser, 'message' => $message->message, 'date' => date("h:i a",strtotime($message->updated_at))];
    $pusher->trigger('chat', 'message', $data);

        return response()->json(['success' => true]);
    }
}
