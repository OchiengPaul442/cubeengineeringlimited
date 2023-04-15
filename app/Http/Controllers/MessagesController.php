<?php

namespace App\Http\Controllers;

use App\Models\messages;
use App\Http\Requests\StoremessagesRequest;
use App\Http\Requests\UpdatemessagesRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Mail Edit-Cube Engineering and General supplies Limited';
        $messages = messages::all();
        return view('Admin.pages.messages', compact('title', 'messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoremessagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremessagesRequest $request)
    {
        // validate the form data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'subject' => 'required|max:50',
            'message' => 'required',
        ]);
        // store in the database
        $message = new messages();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $result = $message->save();

        if ($result) {
            return response()->json(['success' => 'Message sent successfully!, We shall be contacting you within the next three working days, thank you for your response.']);
        } else {
            return response()->json(['error' => 'Error! Message not sent, please try again.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Mail Edit-Cube Engineering and General supplies Limited';
        $message = messages::find($id);
        $messages = messages::all();
        return view('Admin.pages.messages', compact('title', 'message', 'messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit(messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemessagesRequest  $request
     * @param  \App\Models\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemessagesRequest $request, messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = messages::find($id);
        $message->delete();
        return redirect()->back()->with('success', 'Message deleted successfully!');
    }

}
