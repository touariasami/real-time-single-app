<?php

namespace App\Http\Controllers;

use App\Model\Like;
use App\Model\Reply;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends Controller
{

    public function likeIt(Reply $reply){
        $reply->likes()->create([
            //'user_id' => auth()->id(),
            'user_id' => 1,
        ]);
        return response('LikeIt', Response::HTTP_CREATED);
    }

    public function unLikeIt(Reply $reply){
        //$reply->likes->where('user_id', auth()->id())->first()->delete();
        $reply->likes->where('user_id', 1)->first()->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

}
