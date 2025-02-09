<?php

namespace App\Http\Controllers;

use App\Models\MessageHeader;
use Illuminate\Http\Request;

class MessageHeaderController extends Controller
{
    public function index()
    {
        // Fetch all records
        $messageHeaders = MessageHeader::all();
        return view('message_headers.index', compact('messageHeaders'));
    }

    public function create()
    {
        // Show the create form
        return view('message_headers.create');
    }

    public function store(Request $request)
    {
        // Validate and save the new record
        $validatedData = $request->validate([
            'chat_id' => 'required',
            'user1' => 'required',
            'user2' => 'required',
            'date' => 'required|date',
        ]);

        MessageHeader::create($validatedData);
        return redirect()->route('message-headers.index')->with('success', 'Message Header created successfully.');
    }

    public function show($id)
    {
        // Display a single record
        $messageHeader = MessageHeader::findOrFail($id);
        return view('message_headers.show', compact('messageHeader'));
    }

    public function edit($id)
    {
        // Show the edit form
        $messageHeader = MessageHeader::findOrFail($id);
        return view('message_headers.edit', compact('messageHeader'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the record
        $validatedData = $request->validate([
            'chat_id' => 'required',
            'user1' => 'required',
            'user2' => 'required',
            'date' => 'required|date',
        ]);

        $messageHeader = MessageHeader::findOrFail($id);
        $messageHeader->update($validatedData);

        return redirect()->route('message-headers.index')->with('success', 'Message Header updated successfully.');
    }

    public function destroy($id)
    {
        // Delete the record
        $messageHeader = MessageHeader::findOrFail($id);
        $messageHeader->delete();

        return redirect()->route('message-headers.index')->with('success', 'Message Header deleted successfully.');
    }
}
