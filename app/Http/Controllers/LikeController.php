<?php

namespace App\Http\Controllers;

use App\Model\Like;
use App\Model\Reply;
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
        return response('LikeIt', Response::HTTP_CREATED);
    }

    public function unLikeIt(Reply $reply){
        $reply->likes->where('user_id', auth()->id())->first()->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

}
