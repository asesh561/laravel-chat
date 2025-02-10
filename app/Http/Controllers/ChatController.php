<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Message;
use App\Models\MessageHeader;
use App\Models\User;
use App\Models\groups;
use App\Models\groups_messages;
use App\Models\group_members;
use Illuminate\Http\Request;
use Pusher\Pusher;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Str;



class ChatController extends Controller
{
    public function index()
{

    $messages = [];
    $checkarray = [];
    $gmessages = []; // Initialize as an empty array
    $gcheckarray = []; // Initialize as an empty array
    $messages_data = MessageHeader::where(function ($query) {
        $query->where('user1_id', session()->get('emp_id')); // Use user_id instead of chat_name
    })
    ->orWhere(function ($query) {
        $query->where('user2_id', session()->get('emp_id')); // Use user_id instead of chat_name
    })
    ->get();


                            if(count($messages_data) == '0')
                            {

                            }
    else {






        foreach ($messages_data as $msg) {
            // Create a unique identifier using user1_id and user2_id
            // This ensures that even users with the same name will get a unique chat identifier
            $chatIdentifier = implode('-', [
                $msg->user1_id, $msg->user2_id // Only use IDs here to ensure uniqueness
            ]);

            if (!in_array($chatIdentifier, $checkarray)) {
                $checkarray[] = $chatIdentifier;

                // Fetch the last message for this chat
                $lastMessage = Message::where('chat_id', $msg->chat_id)
                    ->orderBy('created_at', 'desc')
                    ->first();

                // Initialize variables
                $messagePreview = 'Start a new conversation';
                $fileInfo = [
                    'type' => 'text',
                    'icon' => '',
                    'path' => '',
                    'preview_type' => 'text',
                ];

                if ($lastMessage) {
                    if ($lastMessage->file_path && $lastMessage->file_path != '') {
                        $cleanPath = str_replace('products/', '', $lastMessage->file_path);
                        $filePathParts = explode(',', $cleanPath);

                        if (!empty($filePathParts[0])) {
                            $filePath = $filePathParts[0];
                            $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                            $fileTypes = [
                                'image' => ['jpg', 'jpeg', 'png', 'gif'],
                                'video' => ['mp4', 'avi', 'mov', 'wmv'],
                                'pdf' => ['pdf'],
                                'doc' => ['doc', 'docx'],
                                'excel' => ['xls', 'xlsx'],
                                'zip' => ['zip', 'rar', '7z'],
                                'audio' => ['mp3', 'wav', 'ogg'],
                            ];

                            $fileInfo['path'] = asset('products/' . $filePath);

                            foreach ($fileTypes as $type => $extensions) {
                                if (in_array($extension, $extensions)) {
                                    $fileInfo['type'] = $type;
                                    switch ($type) {
                                        case 'image':
                                            $fileInfo['preview_type'] = 'image';
                                            $messagePreview = '';
                                            break;
                                        case 'video':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "🎥 Video";
                                            break;
                                        case 'pdf':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "📄 PDF Document";
                                            break;
                                        case 'doc':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "📝 Document";
                                            break;
                                        case 'excel':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "📊 Spreadsheet";
                                            break;
                                        case 'zip':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "🗜️ Archive";
                                            break;
                                        case 'audio':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "🎵 Audio";
                                            break;
                                    }
                                    break;
                                }
                            }
                        }
                    } elseif ($lastMessage->message) {
                        $messagePreview = Str::limit($lastMessage->message, 30, '...');
                    }
                }
                $department = User::where('Employee_id', $msg->user2_id)->value('Department');
                // Create message array with consistent keys
                $messageArray = [
                    "chat_id" => $msg->chat_id,
                    "chatname" => ($msg->user1 == session()->get('chat_name')) ? $msg->user2 : $msg->user1,
                    "empid1" => ($msg->user1_id == session()->get('emp_id')) ?  $msg->user1_id : $msg->user2_id,
                    "Department" => $department,
                    "empid2" => ($msg->user2_id == session()->get('emp_id'))? $msg->user1_id : $msg->user2_id,
                    "des" => $messagePreview,
                    "preview_type" => $fileInfo['preview_type'],
                    "file_path" => $fileInfo['path'],
                    "created_at" => $lastMessage ? $lastMessage->created_at : $msg->created_at,
                    "user1" => $msg->user1,
                    "user2" => $msg->user2,
                    "message" => $lastMessage ? $lastMessage->message : '',
                ];

                $messages[] = $messageArray;
            }
        }


    }







        $result = group_members::where('user_name', session()->get('chat_name'))
                       ->where('user_id', session()->get('emp_id'))
                       ->get();


        $gmessages = []; // Initialize the array to avoid errors if $result is empty

        if ($result) {
            foreach ($result as $gmsg) {
                $groupMembers = group_members::where('group_id', $gmsg->group_id)->get();
                $memberNames = $groupMembers->pluck('user_name')->toArray(); // List of member names
                $memberCount = $groupMembers->count();



                // Fetch the last message for this chat
                $lastMessage = groups_messages::where('chat_id', $gmsg->group_id)
                                   ->orderBy('created_at', 'desc')
                                   ->first();

                // Initialize variables
                $messagePreview = 'Start a new conversation';
                $fileInfo = [
                    'type' => 'text',
                    'icon' => '',
                    'path' => '',
                    'preview_type' => 'text'
                ];

                if ($lastMessage) {
                    if ($lastMessage->file_path && $lastMessage->file_path != '') {
                        // Remove the "products/" prefix if it exists
                        $cleanPath = str_replace('products/', '', $lastMessage->file_path);
                        $filePathParts = explode(',', $cleanPath);

                        // Process first file in the path
                        if (!empty($filePathParts[0])) {
                            $filePath = $filePathParts[0];
                            $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                            // Define file types and their icons
                            $fileTypes = [
                                'image' => ['jpg', 'jpeg', 'png', 'gif'],
                                'video' => ['mp4', 'avi', 'mov', 'wmv'],
                                'pdf' => ['pdf'],
                                'doc' => ['doc', 'docx'],
                                'excel' => ['xls', 'xlsx'],
                                'zip' => ['zip', 'rar', '7z'],
                                'audio' => ['mp3', 'wav', 'ogg']
                            ];

                            // Determine file type and icon
                            $fileInfo['path'] = asset('products/' . $filePath);

                            foreach ($fileTypes as $type => $extensions) {
                                if (in_array($extension, $extensions)) {
                                    $fileInfo['type'] = $type;
                                    switch ($type) {
                                        case 'image':
                                            $fileInfo['preview_type'] = 'image';
                                            $messagePreview = "";
                                            break;
                                        case 'video':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "🎥 Video";
                                            break;
                                        case 'pdf':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "📄 PDF Document";
                                            break;
                                        case 'doc':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "📝 Document";
                                            break;
                                        case 'excel':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "📊 Spreadsheet";
                                            break;
                                        case 'zip':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "🗜️ Archive";
                                            break;
                                        case 'audio':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "🎵 Audio";
                                            break;
                                    }
                                    break;
                                }
                            }
                        }
                    } else if ($lastMessage->message) {
                        $messagePreview = Str::limit($lastMessage->message, 30, '...');
                    }
                }





                $gmessages[] = [
                    "chat_id" => (string) $gmsg->group_id,
                    "chatname" => (string) $gmsg->group_name,
                    "members" => json_encode($memberNames), // Convert array to JSON string
                    "des" => $messagePreview,
                    "preview_type" => $fileInfo['preview_type'],
                    "file_path" => $fileInfo['path'],
                    "created_at" => $lastMessage ? $lastMessage->created_at : $msg->created_at,
                    "member_count" => (string) $memberCount, // Ensure this is a string
                    "username" => (string) session()->get('chat_name'),
                    "message" => (string) ($lastMessage ? $lastMessage->message : ''), // Default to empty string if null
                ];


            }


        // Sort messages by created_at in descending order
        usort($messages, function($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });
    }


    $userdata = User::where('name', session()->get('chat_name'))->first();

    return view('chat', compact('messages', 'gmessages', 'userdata'));
}

public function index1()
{

    $messages = [];
    $checkarray = [];
    $gmessages = []; // Initialize as an empty array
    $gcheckarray = []; // Initialize as an empty array
    $messages_data = MessageHeader::where(function ($query) {
        $query->where('user1_id', session()->get('emp_id')); // Use user_id instead of chat_name
    })
    ->orWhere(function ($query) {
        $query->where('user2_id', session()->get('emp_id')); // Use user_id instead of chat_name
    })
    ->get();


                            if(count($messages_data) == '0')
                            {

                            }
    else {






        foreach ($messages_data as $msg) {
            // Create a unique identifier using user1_id and user2_id
            // This ensures that even users with the same name will get a unique chat identifier
            $chatIdentifier = implode('-', [
                $msg->user1_id, $msg->user2_id // Only use IDs here to ensure uniqueness
            ]);

            if (!in_array($chatIdentifier, $checkarray)) {
                $checkarray[] = $chatIdentifier;

                // Fetch the last message for this chat
                $lastMessage = Message::where('chat_id', $msg->chat_id)
                    ->orderBy('created_at', 'desc')
                    ->first();

                // Initialize variables
                $messagePreview = 'Start a new conversation';
                $fileInfo = [
                    'type' => 'text',
                    'icon' => '',
                    'path' => '',
                    'preview_type' => 'text',
                ];

                if ($lastMessage) {
                    if ($lastMessage->file_path && $lastMessage->file_path != '') {
                        $cleanPath = str_replace('products/', '', $lastMessage->file_path);
                        $filePathParts = explode(',', $cleanPath);

                        if (!empty($filePathParts[0])) {
                            $filePath = $filePathParts[0];
                            $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                            $fileTypes = [
                                'image' => ['jpg', 'jpeg', 'png', 'gif'],
                                'video' => ['mp4', 'avi', 'mov', 'wmv'],
                                'pdf' => ['pdf'],
                                'doc' => ['doc', 'docx'],
                                'excel' => ['xls', 'xlsx'],
                                'zip' => ['zip', 'rar', '7z'],
                                'audio' => ['mp3', 'wav', 'ogg'],
                            ];

                            $fileInfo['path'] = asset('products/' . $filePath);

                            foreach ($fileTypes as $type => $extensions) {
                                if (in_array($extension, $extensions)) {
                                    $fileInfo['type'] = $type;
                                    switch ($type) {
                                        case 'image':
                                            $fileInfo['preview_type'] = 'image';
                                            $messagePreview = '';
                                            break;
                                        case 'video':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "🎥 Video";
                                            break;
                                        case 'pdf':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "📄 PDF Document";
                                            break;
                                        case 'doc':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "📝 Document";
                                            break;
                                        case 'excel':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "📊 Spreadsheet";
                                            break;
                                        case 'zip':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "🗜️ Archive";
                                            break;
                                        case 'audio':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "🎵 Audio";
                                            break;
                                    }
                                    break;
                                }
                            }
                        }
                    } elseif ($lastMessage->message) {
                        $messagePreview = Str::limit($lastMessage->message, 30, '...');
                    }
                }
                $department = User::where('Employee_id', $msg->user2_id)->value('Department');
                // Create message array with consistent keys
                $messageArray = [
                    "chat_id" => $msg->chat_id,
                    "chatname" => ($msg->user1 == session()->get('chat_name')) ? $msg->user2 : $msg->user1,
                    "empid1" => ($msg->user1_id == session()->get('emp_id')) ?  $msg->user1_id : $msg->user2_id,
                    "Department" => $department,
                    "empid2" => ($msg->user2_id == session()->get('emp_id'))? $msg->user1_id : $msg->user2_id,
                    "des" => $messagePreview,
                    "preview_type" => $fileInfo['preview_type'],
                    "file_path" => $fileInfo['path'],
                    "created_at" => $lastMessage ? $lastMessage->created_at : $msg->created_at,
                    "user1" => $msg->user1,
                    "user2" => $msg->user2,
                    "message" => $lastMessage ? $lastMessage->message : '',
                ];

                $messages[] = $messageArray;
            }
        }


    }







        $result = group_members::where('user_name', session()->get('chat_name'))
                       ->where('user_id', session()->get('emp_id'))
                       ->get();


        $gmessages = []; // Initialize the array to avoid errors if $result is empty

        if ($result) {
            foreach ($result as $gmsg) {
                $groupMembers = group_members::where('group_id', $gmsg->group_id)->get();
                $memberNames = $groupMembers->pluck('user_name')->toArray(); // List of member names
                $memberCount = $groupMembers->count();



                // Fetch the last message for this chat
                $lastMessage = groups_messages::where('chat_id', $gmsg->group_id)
                                   ->orderBy('created_at', 'desc')
                                   ->first();

                // Initialize variables
                $messagePreview = 'Start a new conversation';
                $fileInfo = [
                    'type' => 'text',
                    'icon' => '',
                    'path' => '',
                    'preview_type' => 'text'
                ];

                if ($lastMessage) {
                    if ($lastMessage->file_path && $lastMessage->file_path != '') {
                        // Remove the "products/" prefix if it exists
                        $cleanPath = str_replace('products/', '', $lastMessage->file_path);
                        $filePathParts = explode(',', $cleanPath);

                        // Process first file in the path
                        if (!empty($filePathParts[0])) {
                            $filePath = $filePathParts[0];
                            $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                            // Define file types and their icons
                            $fileTypes = [
                                'image' => ['jpg', 'jpeg', 'png', 'gif'],
                                'video' => ['mp4', 'avi', 'mov', 'wmv'],
                                'pdf' => ['pdf'],
                                'doc' => ['doc', 'docx'],
                                'excel' => ['xls', 'xlsx'],
                                'zip' => ['zip', 'rar', '7z'],
                                'audio' => ['mp3', 'wav', 'ogg']
                            ];

                            // Determine file type and icon
                            $fileInfo['path'] = asset('products/' . $filePath);

                            foreach ($fileTypes as $type => $extensions) {
                                if (in_array($extension, $extensions)) {
                                    $fileInfo['type'] = $type;
                                    switch ($type) {
                                        case 'image':
                                            $fileInfo['preview_type'] = 'image';
                                            $messagePreview = "";
                                            break;
                                        case 'video':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "🎥 Video";
                                            break;
                                        case 'pdf':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "📄 PDF Document";
                                            break;
                                        case 'doc':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "📝 Document";
                                            break;
                                        case 'excel':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "📊 Spreadsheet";
                                            break;
                                        case 'zip':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "🗜️ Archive";
                                            break;
                                        case 'audio':
                                            $fileInfo['preview_type'] = 'icon';
                                            $messagePreview = "🎵 Audio";
                                            break;
                                    }
                                    break;
                                }
                            }
                        }
                    } else if ($lastMessage->message) {
                        $messagePreview = Str::limit($lastMessage->message, 30, '...');
                    }
                }





                $gmessages[] = [
                    "chat_id" => (string) $gmsg->group_id,
                    "chatname" => (string) $gmsg->group_name,
                    "members" => json_encode($memberNames), // Convert array to JSON string
                    "des" => $messagePreview,
                    "preview_type" => $fileInfo['preview_type'],
                    "file_path" => $fileInfo['path'],
                    "created_at" => $lastMessage ? $lastMessage->created_at : $msg->created_at,
                    "member_count" => (string) $memberCount, // Ensure this is a string
                    "username" => (string) session()->get('chat_name'),
                    "message" => (string) ($lastMessage ? $lastMessage->message : ''), // Default to empty string if null
                ];


            }


        // Sort messages by created_at in descending order
        usort($messages, function($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });
    }


    return response()->json(['messages' => $messages]);
}

    public function chatdata(Request $request)
    {

        $chatId = $request->input('chatid');

        $messages = Message::where('chat_id', $chatId)
        ->where(function ($query) {
            $query->where('firstuser_id', session()->get('emp_id'))
                  ->orWhere('seconduser_id', session()->get('emp_id'));
        })
        ->orderBy('created_at', 'asc')
        ->get();




        return response()->json(['data' => $messages]);

    }

    public function chatdesignation(Request $request)
    {
        $chatId = $request->input('chatid');

        $department = User::where('Employee_id', $chatId)->value('Department');

        return $department;
    }

    public function chatgroupdesignation(Request $request)
    {
        $arr = [];
        $members = $request->input('members');

        // Log the members to see what we're working with
        \Log::info('Members received:', ['members' => $members]);

        // Decode the JSON string into an array
        if (is_string($members)) {
            $members = json_decode($members, true); // Decode JSON string to array
        }

        // Log the processed members
        \Log::info('Processed members:', ['members' => $members]);

        foreach ($members as $member) {
            $member = trim($member); // Remove extra spaces

            // Log the member name for debugging purposes
            \Log::info('Member being queried: ' . $member);

            // Fetch department using Eloquent Model
            $department = User::whereRaw('LOWER(name) = ?', [strtolower($member)])->value('Department');

            // Check if department was found
            if ($department) {
                $arr[] = $member . '@' . $department; // Store each "member@department"
            } else {
                \Log::warning('Department not found for: ' . $member);  // Log warning for missing departments
                $arr[] = $member . '@Not Found'; // Handle missing department
            }
        }
        return response()->json(['data' => $arr]);

    }




    public function gchatdata(Request $request)
    {

        $chatid= $request->input('chatid');
        $chatname= $request->input('gchatname');
        $chatuser= $request->input('chatuser');
        $Message = groups_messages::where('group_name',$chatname)->get();

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
        'message' => 'nullable|string',
        'chunk_number' => 'nullable|integer',
        'total_chunks' => 'nullable|integer',
        'file_identifier' => 'nullable|string'
    ]);

    $firstuser = $request->input('firstuser');
    $seconduser = $request->input('seconduser');
    $empid1 = $request->input('empid1');
    $empid2 = $request->input('empid2');
    $message = $request->input('message') ?? '';

    // Find or create chat ID
    $chat_id = MessageHeader::where(function ($query) use ($firstuser, $seconduser, $empid1, $empid2) {
            $query->where('user1_id', $empid1)
                  ->where('user2_id', $empid2);
        })
        ->orWhere(function ($query) use ($firstuser, $seconduser, $empid1, $empid2) {
            $query->where('user2_id', $empid1)
                  ->where('user1_id', $empid2);
        })
        ->value('chat_id');


    if (!$chat_id) {
        $chat_id = MessageHeader::max('chat_id') + 1;

        MessageHeader::create([
            'chat_id' => $chat_id,
            'user1' => $firstuser,
            'user2' => $seconduser,
            'date' => now(),
        ]);
    }

    // return dd($request->all());
    $filearr= explode(',',$request->file_path[0]);
    $filearr= implode(',products/',$filearr);
    if($filearr != ""){
        $filearr = "products/".$filearr;
    }

    $message = Message::create([
        'chat_id' => $chat_id,
        'firstuser' => $firstuser,
        'firstuser_id' => $empid1,
        'seconduser' => $seconduser,
        'seconduser_id' => $empid2,
        'message' => $message,
        'file_path' => $filearr,
    ]);

    // Trigger Pusher event
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

    $data = [
        'chat_id' => $message->chat_id,
        'firstuser' => $message->firstuser,
        'empid1' => $message->firstuser_id,
        'seconduser' => $message->seconduser,
        'empid2' => $message->seconduser_id,
        'message' => $message->message,
        'date' => $message->created_at->format("h:i a"),
        'file_path' => $filearr,
    ];
    $pusher->trigger('chat', 'message', $data);

    return response()->json(['success' => true]);
}

public function gstore(Request $request)
{


      $user_name = $request->user_name;

      $user_id = $request->user_id;


     $chat_name = $request->chat_name;



    $id = group_members::where('user_id', $user_id)
    ->value('group_id');

    $filearr= explode(',',$request->file_path[0]);

    $filearr= implode(',products/',$filearr);
    if($filearr != ""){
        $filearr = "products/".$filearr;
    }

    // Save the new message
    $groups_messages = groups_messages::create([
        'chat_id' => $id,
        'group_name' => $chat_name,
    'user' => $user_name,
    'user_id' => $user_id,
        'message' => $request->input('message'),
        'file_path' => $filearr,
    ]);

    // Trigger a Pusher event to notify the recipient
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

    $data = [
        'chat_id' => $groups_messages->chat_id,
        'group_name' => $groups_messages->group_name,
        'gmessage' => $groups_messages->message,
        'date' => $groups_messages->created_at->format("h:i a"),
    ];
    $pusher->trigger('group_chat', 'gmessage', $data);

    return response()->json(['success' => true]);


}

// public function checkReloadStatus(Request $request) {

//     if (!$request->session()->has('firstReloadDone')) {
//         // Mark first reload as done
//         $request->session()->put('firstReloadDone', true);
//         return response()->json(['reload' => 1]); // First reload
//     } elseif (!$request->session()->has('secondReloadDone')) {
//         // Mark second reload as done
//         $request->session()->put('secondReloadDone', true);
//         return response()->json(['reload' => 2]); // Second reload
//     }


//     return response()->json(['reload' => 0]); // No more reloads
// }








public function searchx()
{
    // Fetching session values
    $chatname = session()->get('chat_name');
    $emp_id = session()->get('emp_id'); // Corrected to store 'emp_id'
$name =  $_GET['query'];
    // Fetch all users except the one with the chat name from the database
    $users = User::select('id', 'name', 'number', 'imgpath', 'Employee_id', 'Department')
    ->where('Employee_id', '!=', $emp_id)
    ->where(function ($query) use ($name) {
        $query->where('name', 'like', '%' . $name . '%')
              ->orWhere('Department', 'like', '%' . $name . '%');
    })
    ->get();



    // Return the result as a JSON response
    return response()->json($users);
}





public function searchxrest()
{
    // Get the 'members' parameter
    $members = $_GET['members'] ?? '';

    // Check if $members is a JSON-encoded array or a comma-separated string
    if (is_string($members)) {
        if ($decoded = json_decode($members, true)) {
            // If JSON-decoded successfully, assign it as an array
            $members = $decoded;
        } else {
            // Otherwise, treat it as a comma-separated string
            $members = explode(',', $members);
        }
    }

    // Process the array: trim whitespace and remove duplicates
    $members = array_map('trim', $members); // Trim whitespace
    $members = array_unique($members); // Remove duplicates

    // Fetch users excluding the specified names
    $users = User::select('id', 'name', 'number', 'imgpath')
        ->whereNotIn('name', $members) // Exclude names in the $members array
        ->get();

    // Return the result as a JSON response
    return response()->json($users);
}

private function combineChunks($tempPath, $paths, $fileType, $firstuser, $seconduser, $dateTime, $uniqueId)
{
    $chunks = File::files($tempPath);
    sort($chunks);

    $finalPath = null;
    if (strpos($fileType, 'image/') === 0) {
        $imageName = "image_{$firstuser}_{$seconduser}_{$dateTime}_{$uniqueId}." . pathinfo($chunks[0], PATHINFO_EXTENSION);
        $finalPath = $paths['images'] . $imageName;
        $this->mergeChunks($chunks, $finalPath);
        return 'products/images/' . $imageName;
    } elseif (strpos($fileType, 'video/') === 0) {
        $videoName = "video_{$firstuser}_{$seconduser}_{$dateTime}_{$uniqueId}." . pathinfo($chunks[0], PATHINFO_EXTENSION);
        $finalPath = $paths['videos'] . $videoName;
        $this->mergeChunks($chunks, $finalPath);
        return 'products/videos/' . $videoName;
    } else {
        $documentName = "doc_{$firstuser}_{$seconduser}_{$dateTime}_{$uniqueId}." . pathinfo($chunks[0], PATHINFO_EXTENSION);
        $finalPath = $paths['documents'] . $documentName;
        $this->mergeChunks($chunks, $finalPath);
        return 'products/documents/' . $documentName;
    }
}

private function mergeChunks($chunks, $finalPath)
{
    // Open the final file for writing
    $finalFile = fopen($finalPath, 'wb');

    // Iterate through chunks and write to final file
    foreach ($chunks as $chunk) {
        $chunkContent = file_get_contents($chunk);
        fwrite($finalFile, $chunkContent);
    }

    // Close the final file
    fclose($finalFile);
}



// public function sendMessage(Request $request)
// {
//     $chatId = $request->input('chat_id');
//     $messageText = $request->input('message');
//     $filePath = $request->file('file')->store('products');

//     $message = new Message();
//     $message->chat_id = $chatId;
//     $message->message = $messageText;
//     $message->file_path = $filePath;
//     $message->save();

//     $fileInfo = [
//         'type' => 'text',
//         'path' => '',
//         'preview_type' => 'text',
//         'description' => $messageText
//     ];

//     if ($filePath) {
//         $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
//         $fileTypes = [
//             'image' => ['jpg', 'jpeg', 'png', 'gif'],
//             // Add other file types here
//         ];

//         foreach ($fileTypes as $type => $extensions) {
//             if (in_array($extension, $extensions)) {
//                 $fileInfo['type'] = $type;
//                 $fileInfo['preview_type'] = $type === 'image' ? 'image' : 'icon';
//                 $fileInfo['description'] = $type === 'image' ? '📷 Image' : 'New File';
//                 break;
//             }
//         }

//         $fileInfo['path'] = asset('products/' . $filePath);
//     }

//     return response()->json([
//         'chat_id' => $chatId,
//         'chatname' => $request->input('chatname'),
//         'des' => $fileInfo['description'],
//         'preview_type' => $fileInfo['preview_type'],
//         'file_path' => $fileInfo['path']
//     ]);
// }


// me work

public function search(Request $request)
{

    $emp_id = session()->get('emp_id');


    $searchQuery = $request->get('query');


    if (empty($searchQuery)) {
        return response()->json([]);
    }


    $users = User::where(function ($query) use ($searchQuery) {
                    $query->where('name', 'LIKE', "%{$searchQuery}%")
                          ->orWhere('number', 'LIKE', "%{$searchQuery}%")
                          ->orWhere('Department', 'LIKE', "%{$searchQuery}%")
                          ;
                })
                ->where('Employee_id', '!=', $emp_id)
                ->get();

    return response()->json($users);
}




    // Show chat window for a specific user
    public function chat($id)
{
    $user = User::findOrFail($id); // Find the selected user
    return view('chat', compact('user')); // Pass the user to the view
}

public function storeme(Request $request)
{

    // Validate the request data (ensure both user1 and user2 are strings)
    $request->validate([
        'user1' => 'required|string',  // Ensure user1 is the logged-in user's name
        'user2' => 'required|string',  // Ensure user2 is the selected user's name
    ]);

    $user1 = $request->user1; // Logged-in user's name
    $user2 = $request->user2; // Selected user's name
    $empid2 = $request->user2_id;
    // Log the values for debugging
    \Log::info("User1: " . $user1);  // Check if user1 is correct
    \Log::info("User2: " . $user2);  // Check if user2 is correct

    // Check if a chat between user1 and user2 already exists
    $existingChat = MessageHeader::where(function ($query) use ($user1, $user2) {
        $query->where('user1', $user1)
              ->where('user1_id', session()->get('emp_id'))
              ->where('user2', $user2)
              ->where('user2_id', session()->get('emp_id'));
    })
    ->orWhere(function ($query) use ($user1, $user2) {
        $query->where('user1', $user2)
              ->where('user1_id', session()->get('emp_id'))
              ->where('user2', $user1)
              ->where('user2_id', session()->get('emp_id')); // Check for reversed order too
    })
    ->first();


    // If the chat exists, return the chat_id
    if ($existingChat) {
        return response()->json([
            'message' => 'Chat already exists',
            'chat_id' => $existingChat->chat_id,
        ]);
    }


    // If no existing chat, create a new chat
    $newChatId = MessageHeader::max('chat_id') + 1;



    // Create the new chat with the correct user names
    $newChat = MessageHeader::create([
        'chat_id' => $newChatId,
        'user1' => $user1,  // Logged-in user's name
        'user1_id' => session()->get('emp_id'),
        'user2' => $user2,  // Selected user's name
        'user2_id' => $empid2,
        'date' => now(),
    ]);

    return response()->json([
        'message' => 'Chat created successfully',
        'chat_id' => $newChat->chat_id,
        'user1_id' =>  $newChat->user1_id,
        'user2_id' =>  $newChat->user2_id,
        'department'=> User::where('Employee_id', $newChat->user2_id)->value('Department'),
    ]);
}

public function storeGroup(Request $request)
{
    $emp_id = session()->get('emp_id');
    // Retrieve the group name, created_by, and members from the request
    $groupName = $request->group_name;
    $created_by = $request->user1Name;
    $members = $request->members;

    $members = array_map('trim', explode(",", $members));


    // Create a new group and store it in the groups table
    $group = groups::create([
        'name' => $groupName,
        'user_id' => $emp_id,
        'created_by' => $created_by,
    ]);

    group_members::create([
        'group_id' => $group->id,  // Use the ID of the newly created group
        'user_name' =>  $created_by,
        'user_id' =>  $emp_id,
        'group_name' => $groupName,

    ]);

    // Insert members into the group_members table
    foreach ($members as $member) {
        group_members::create([
            'group_id' => $group->id,  // Use the ID of the newly created group
            'user_name' => explode("@",$member)[0],
            'user_id' => explode("@",$member)[1],
            'group_name' => $groupName,

        ]);
    }
}



public function updateGroup(Request $request)
{
    // Retrieve the group name, created_by, and members from the request
      $groupName = $request->group_name;
     $created_by = $request->user1Name;
      $members = $request->members;
     $user1Name= $request->user1Name;

$members =  (explode(",",$members));

 $id = groups::where('name', $groupName)->pluck('id')->first();

    // Insert members into the group_members table
    foreach ($members as $member) {
        group_members::create([
            'group_id' => $id,  // Use the ID of the newly created group
            'user_name' => $member,
            'group_name' => $groupName,

        ]);
    }
}


function delete(Request $request)
{



     $groupName = $request->group_name;
     $user = $request->user;



group_members::where('group_name', $groupName)
    ->where('user_name',$user)
    ->delete();

}











public function storeGroupchat(Request $request)
{
    $group_id = $request->group_id;
    $group_name = $request->group_name;
    $created_by = $request->created_by;

    // Check if a group with the same name and ID already exists
    $existingChat = groups::where('name', $group_name)
        ->where('id', $group_id)
        ->first(); // Use 'first' to get the first matching record

    if ($existingChat) {
        return response()->json([
            'message' => 'Chat already exists',
            'group_name' => $existingChat->name, // Access the 'name' property
        ]);
    }

    // Create the new chat
    $newChat = groups::create([
        'name' => $group_name,
        'created_by' => $created_by,
    ]);

    return response()->json([
        'message' => 'Chat created successfully',
        'group_id' => $newChat->id,
     // Correctly access the ID of the newly created group
    ]);
}

public function searchMessages(Request $request)

{

    $query = $request->get('search');



    if (empty($query)) {

        return response()->json([]);

    }



    $messages = Message::where(function($q) use ($query) {

        $q->where('seconduser', 'LIKE', "%{$query}%")

          ->orWhere('message', 'LIKE', "%{$query}%");

    })

    ->where(function($q) {

        // Only fetch messages where the current user is involved

        $q->where('firstuser', session()->get('chat_name'))

          ->orWhere('seconduser', session()->get('chat_name'));

    })

    ->orderBy('created_at', 'desc')

    ->limit(50)

    ->get()

    ->map(function($message) {

        return [

            'chat_id' => $message->chat_id,

            'user' => $message->seconduser,

            'message' => Str::limit($message->message, 100),

            'time' => $message->created_at->format('M d, Y h:i A'),

            'file_path' => $message->file_path

        ];

    });



    return response()->json($messages);

}

}
