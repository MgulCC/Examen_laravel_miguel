<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post; //necesitamos el modelo alumno
use Illuminate\Support\Facades\Auth;
use JWTAuth; //el JWTAuth
use Symfony\Component\HttpFoundation\Response; //Response
use Illuminate\Support\Facades\Validator; //validador
use Illuminate\Support\Facades\Storage;

class PostApiController extends Controller
{   
    //lista los posts
    public function index(){
        return Post::get();
    }

    public function index(){
        return Post::get();
    }

    public function showOne($id){
        //buscar el post por id
        $post = Post::find($id);

        //si el post no existe devolvemos un error
        if(!$post){
            return response()->json([
                'message' => 'Post not found.'
            ], 404);
        }

        //si hay un post, lo devolvemos
        return $post;
    }

    public function store(Request $request){
        //validar los datos recibidos
        $data = $request->only('title', 'status');

        $validator = Validator::make($data, [
            'title' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        //si falla la validacion
        if($validator->fails()){
            return response()->json(['error' => $validator->messages()], 400);
        }

        //cramos el alumno en la bd
        $post = post::create([
            'title' => $request->title,
            'status' => $request->status,
            
        ]);

        return response()->json([
            'message' => 'Post created',
            'data' => $post
        ], Response::HTTP_OK);
    }


    public function update(Request $request, $id){
        //validar datos
        $data = $request->only('title', 'status');

        $validator = Validator::make($data, [
            'title' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ]);

        //si falla
        if($validator->fails()){
            return response()->json(['error' => $validator->messages()], 400);
        }

        //Buscamos el post
        $post = Post::findOrfail($id);

        $post->update($data);

        //Devolver los datos actualizados
        return response()->json([
            'message' => 'Post updates',
            'data' => $post
        ], Response::HTTP_OK);
    }

    public function destroy($id){
        //buscamos el post
        $post = post::find($id);

        if($post){

            //eliminamos el post
            $post->delete();

            //devolvemos respuesta
            return response()->json([
                'messsage' => 'Post eliminado'
            ]);

        }else{
            //Devolvemos respuesta
            return response()->json([
                'messsage' => 'Post no existe'
            ], 401);
        }
    }
}