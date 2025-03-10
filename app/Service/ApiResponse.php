<?php

namespace App\Service;

class ApiResponse{

    public static function created($data){
        return response()->json([
            'status_code' => 201,
            'message' => 'created success',
            'data' => $data,
        ], 201);
    }
    
    //requisição feita com sucesso
    public static function success($data){
        return response()->json([
            'status_code' => 200,
            'message' => 'success',
            'data' => $data,
        ], 200);
    }

    //error
    public static function error($message){
        return response()->json([
            'status_code' => 500,
            'message' => $message
        ], 500);
    }
    
    public static function unauthorized($message){
        return response()->json([
            'status_code' => 422,
            'message' => $message
        ], 422);
    }
    public static function notFound (){
        return response()->json([
            'status_code' => 404,
            'message' => 'nao existe esse requisição'
        ], 404);
    }
    public static function internalServerError($data){
        return response()->json([
            'status_code' => 500,
            'message' => 'error do servidor',
            'data' => $data,
        ], 500);
    }
}