<?php

namespace App\Http\Controllers;

use App\Message;
use Cache;
use Illuminate\Http\Request;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('chat');
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = auth()->user();

        $message = $user->messages()->create([
                'message' => $request->get('message')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        $this->storePosts();

        return ['status' => 'Message Sent!'];
    }

    public function storePosts()
    {
        $posts = Message::with('user')->get();

        foreach ($posts as $post) {
            $this->putInCache( $post->user->name,$post->message);
        }
    }

    private function putInCache($key, $content)
    {
        Cache::store('redis')->put($key, $content);
    }

}
