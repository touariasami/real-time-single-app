<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use App\Model\Question;
use App\Model\Reply;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Notification;
use App\Notifications\NewReplyNotification;
use App\Events\DeleteReplyEvent;


class ReplyController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index','show']]);
    }

    public function index(Question $question)
    {
        //return Reply::latest()->where('question_id',$question->id)->get();
        return ReplyResource::collection($question->replies()->latest()->get());
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question ,Request $request)
    {
        $reply = $question->replies()->create($request->all());

        $user = $question->user;
        //
        //$user->notify(New NewReplyNotification($reply));
        if( $question->user_id != $reply->user_id){
            
            Notification::send($user, new NewReplyNotification($reply));
        }
        


        return response([ 'reply' => new ReplyResource($reply) ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question , Reply $reply)
    {
        return new ReplyResource($reply);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question ,Request $request, Reply $reply)
    {
        $reply->update($request->all());
        return response($reply, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question ,Reply $reply)
    {
        
        broadcast(new DeleteReplyEvent($reply->id))->toOthers();
        $reply->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
