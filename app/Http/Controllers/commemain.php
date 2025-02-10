<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Message;
use App\Models\MessageHeader;
use App\Models\User;
use App\Models\groups_messages;
use Illuminate\Http\Request;
use Pusher\Pusher;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;



class ChatController extends Controller
{
    public function index()
{
    $messages = []; // Initialize as an empty array
    $checkarray = []; // Initialize as an empty array

    $messages_data = MessageHeader::where('user1', session()->get('chat_name'))
                            ->orWhere('user2', session()->get('chat_name'))
                            ->get();
                            // dd($messages_data); 
    if ($messages_data) {
        foreach ($messages_data as $msg) {
            if (!in_array($msg->user1, $checkarray) || !in_array($msg->user2, $checkarray)) {
                $checkarray[] = $msg->user1;
                $checkarray[] = $msg->user2;
                
                // $messages_d = Message::where('chat_id', ('chat_name'))
                //             ->orWhere('chat_id', ('chat_name'))
                //             ->get();

                if ($msg->user1 == session()->get('chat_name')) {

                    $messages[] = [
                        "chat_id" => $msg->chat_id,
                        "chatname" => $msg->user2,
                        "des" => 'New chat',
                        "created_at" => $msg->created_at,
                        "user1" => $msg->user1,
                        "user2" => $msg->user2,
                        "message" => $msg->message,
                    ];
                } else {
                    
                    $messages[] = [
                        "chat_id" => $msg->chat_id,
                        "chatname" => $msg->user1,
                        "des" => 'New chat',
                        "created_at" => $msg->created_at,
                        "user1" => $msg->user1,
                        "user2" => $msg->user2,
                        "message" => $msg->message,
                    ];
                }
            }
        }
    }

    $gmessages = groups_messages::where('firstuser', session()->get('chat_name'))->get();
    $userdata = User::where('name', session()->get('chat_name'))->first();

    return view('chat', compact('messages', 'gmessages', 'userdata'));
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
    // return dd($request->all());
// ini_set('max_execution_time', '3600'); // 1 hour

// // Increase memory limit
// ini_set('memory_limit', '2048M'); // 2GB

// // Increase post data limit
// ini_set('post_max_size', '2048M');

// // Increase file upload size
// ini_set('upload_max_filesize', '2048M');

// // Disable PHP input timeout
// set_time_limit(0); // No timeout
// return '';
    $request->validate([
        'firstuser' => 'required|string|max:100',
        'seconduser' => 'required|string|max:100',
        'message' => 'nullable|string',
        // 'file_path.*' => 'nullable|file|mimes:jpeg,jpg,png,gif,jfif,mp4,mov,pdf,doc,docx,txt,zip|max:2097152', // 2GB = 2048 * 1024 = 2097152 KB
        'chunk_number' => 'nullable|integer',
        'total_chunks' => 'nullable|integer',
        'file_identifier' => 'nullable|string'
    ]);

    $firstuser = $request->input('firstuser');
    $seconduser = $request->input('seconduser');
    $message = $request->input('message') ?? '';

    // Find or create chat ID
    $chat_id = MessageHeader::where(function ($query) use ($firstuser, $seconduser) {
        $query->where('user1', $firstuser)
              ->where('user2', $seconduser);
    })->orWhere(function ($query) use ($firstuser, $seconduser) {
        $query->where('user1', $seconduser)
              ->where('user2', $firstuser);
    })->value('chat_id');

    if (!$chat_id) {
        $chat_id = MessageHeader::max('chat_id') + 1;

        MessageHeader::create([
            'chat_id' => $chat_id,
            'user1' => $firstuser,
            'user2' => $seconduser,
            'date' => now(),
        ]);
    }

    // // Create storage paths for different file types
    // $paths = [
    //     'images' => public_path('products/images/'),
    //     'videos' => public_path('products/videos/'),
    //     'documents' => public_path('products/documents/')
    // ];

    // // Ensure directories exist
    // foreach ($paths as $path) {
    //     if (!File::exists($path)) {
    //         File::makeDirectory($path, 0777, true);
    //     } else {
    //         chmod($path, 0777);
    //     }
    // }

    // Handle chunked file upload
    // $imageNames = [];
    // if ($request->hasFile('file_path')) {
    //     $files = $request->file('file_path');
    //     foreach ($files as $file) {
    //         // Determine file type and appropriate storage path
    //         $fileType = $file->getClientMimeType();
    //         $dateTime = now()->format('Ymd_His');
    //         $uniqueId = uniqid();
    //         $chunkNumber = $request->input('chunk_number', 1);
    //         $totalChunks = $request->input('total_chunks', 1);
    //         $fileIdentifier = $request->input('file_identifier', '');

    //         // Build temporary and final file paths
    //         $tempPath = storage_path("app/chunks/{$fileIdentifier}");
    //         File::makeDirectory($tempPath, 0777, true, true);

    //         $originalExtension = $file->getClientOriginalExtension();
    //         $tempFilePath = "{$tempPath}/{$chunkNumber}_{$fileIdentifier}.{$originalExtension}";
    //         $file->move($tempPath, "{$chunkNumber}_{$fileIdentifier}.{$originalExtension}");

    //         // Check if all chunks have been uploaded
    //         $uploadedChunks = File::files($tempPath);
    //         if (count($uploadedChunks) == $totalChunks) {
    //             // Combine chunks
    //             $finalFileName = $this->combineChunks($tempPath, $paths, $fileType, $firstuser, $seconduser, $dateTime, $uniqueId);
                
    //             if ($finalFileName) {
    //                 $imageNames[] = $finalFileName;
    //             }

    //             // Clean up temporary chunk files
    //             File::deleteDirectory($tempPath);
    //         }
    //     }
    // }

    // Save the new message with file paths (if any)
    // return dd($request->all());
    $message = Message::create([
        'chat_id' => $chat_id,
        'firstuser' => $firstuser,
        'seconduser' => $seconduser,
        'message' => $message,
        'file_path' => $request->file_path[0],
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
        'firstuser' => $message->firstuser,
        'seconduser' => $message->seconduser,
        'message' => $message->message,
        'date' => $message->created_at->format("h:i a"),
    ];
    $pusher->trigger('chat', 'message', $data);

    return response()->json(['success' => true]);
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




// me work 

    public function search(Request $request)
    {
        // Retrieve the search query from the input
        $query = $request->get('query');
    
        // Ensure the query is not empty before searching
        if (empty($query)) {
            return response()->json([]);
        }
    
        // Query the User model for name or phone number matching the search query
        $users = User::where('name', 'LIKE', "%{$query}%")
                     ->orWhere('number', 'LIKE', "%{$query}%")
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

    // Log the values for debugging
    \Log::info("User1: " . $user1);  // Check if user1 is correct
    \Log::info("User2: " . $user2);  // Check if user2 is correct

    // Check if a chat between user1 and user2 already exists
    $existingChat = MessageHeader::where(function ($query) use ($user1, $user2) {
        $query->where('user1', $user1)->where('user2', $user2);
    })->orWhere(function ($query) use ($user1, $user2) {
        $query->where('user1', $user2)->where('user2', $user1);  // Check for reversed order too
    })->first();

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
        'user2' => $user2,  // Selected user's name
        'date' => now(),
    ]);

    return response()->json([
        'message' => 'Chat created successfully',
        'chat_id' => $newChat->chat_id,  // Return the new chat_id
    ]);
}

    
}
