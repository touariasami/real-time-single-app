<?php

namespace App\Http\Controllers;

use App\Model\Like;
use App\Model\Reply;
use App\Events\LikeEvent;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT');
    }

    public function likeIt(Reply $reply){
        $reply->likes()->create([
            'user_id' => auth()->id(),
        ]);

        broadcast(new LikeEvent($reply->id,1))->toOthers();


        return response('LikeIt', Response::HTTP_CREATED);
    }

    public function unLikeIt(Reply $reply){
        $reply->likes->where('user_id', auth()->id())->first()->delete();

        broadcast(new LikeEvent($reply->id,0))->toOthers();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
