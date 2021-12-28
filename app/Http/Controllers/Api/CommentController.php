<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        // $request
        // récupérer le message
        // Créer un commentaire
        // Assigner le commentaire à l'utilisateur
        // OK ou NON OK

        $content = $request->input('content');
        $comment_id = $request->input('comment_id');
        $post_id = $request->input('post_id');

        //Empêche l'ajout de commentaires en masse
        // $lastComment = Comment::where('post_id', '=', $post_id)->latest()->first();

        // if($lastComment->user_id == $request->user()->id){
        //     return false;
        // }

        //Si content n'est pas vide, on ajoute le commentaire
        if(!empty($content) && !empty($post_id)){
            $comment = new Comment;
            $comment->content = $content;
            $comment->post_id = $post_id;

            if($comment_id)
            {
                $comment->comment_id = $comment_id;
            }

            $comment->user_id = $request->user()->id;
            $comment->save();

            return true;
        }

        return false;
    }
}
