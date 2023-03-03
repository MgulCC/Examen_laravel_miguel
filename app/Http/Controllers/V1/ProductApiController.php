<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; //necesitamos el modelo alumno
use JWTAuth; //el JWTAuth
use Symfony\Component\HttpFoundation\Response; //Response
use Illuminate\Support\Facades\Validator; //validador
use Illuminate\Support\Facades\Storage;

class PostApiController extends Controller
{   
    //lista los posts
    public function index(){
        return Product::get();
    }

    public function showOne($id){
        //buscar el post por id
        $product = Product::find($id);

        //si el post no existe devolvemos un error
        if(!$product){
            return response()->json([
                'message' => 'Product out of service.'
            ], 404);
        }

        //si hay un post, lo devolvemos
        return $product;
    }

    public function store(Request $request){
        //validar los datos recibidos
        $data = $request->only('name', 'description', 'quantity', 'status');

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'quantity' => 'required|int|min:6|max:100',
            'status' => 'required|int|min:6|max:100'
        ]);

        //si falla la validacion
        if($validator->fails()){
            return response()->json(['error' => $validator->messages()], 400);
        }

        //cramos el producto en la bd
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'status' => $request->status,
            
        ]);

        return response()->json([
            'message' => 'Product created',
            'data' => $product
        ], Response::HTTP_OK);
    }


    public function update(Request $request, $id){
        //validar datos
        $data = $request->only('name', 'description', 'quantity', 'status');

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'quantity' => 'required|int|min:6|max:100',
            'status' => 'required|int|min:6|max:100'
        ]);

        //si falla
        if($validator->fails()){
            return response()->json(['error' => $validator->messages()], 400);
        }

        //Buscamos el product
        $product = Product::findOrfail($id);

        $product->update($data);

        //Devolver los datos actualizados
        return response()->json([
            'message' => 'Post updates',
            'data' => $product
        ], Response::HTTP_OK);
    }

    public function destroy($id){
        //buscamos el post
        $product = Product::find($id);

        if($product){

            //eliminamos el post
            $product->delete();

            //devolvemos respuesta
            return response()->json([
                'messsage' => 'Product eliminado'
            ]);

        }else{
            //Devolvemos respuesta
            return response()->json([
                'messsage' => 'Product no existe'
            ], 401);
        }
    }
}