<?php
namespace App\Helpers;


class Response {

    public const ADDED_SUCCESSFULLY = "record has been added successfully";
    public const UPDATED_SUCCESSFULLY = "record has been updated successfully";
    public const DELETED_SUCCESSFULLY = "record has been deleted successfully";
    public const TRASHED_SUCCESSFULLY = "record has been trashed successfully";
    public const RESTORED_SUCCESSFULLY = "record has been restored successfully";
    public const NOT_ALLOWED = "method not allowed";
    public const UNAUTHORIZED = "action not authorized";
    public const NOT_AUTHENTICATED = "you are not authenticated";
    public const NOT_FOUND = "record not found";
    public const USER_NOT_FOUND = "user not found";
    public const WRONG_PASSWORD = "invalid password";
    public const SUCCESS= "success";
    public const FAILED= "failed";
    public const LOGIN_SUCCESSFULLY = "logged in successfully";
    public const LOGOUT_SUCCESSFULLY = "logout successfully";
    public const LOGIN_FAILED = "login failed!";
    public const LOGIN_MESSAGE = "you must sign in before";

    /**
     * @param mixed $message
     * @param integer $status
     * @param null $content
     * 
     * @return json
     */
    public static function respondSuccess($message ,$content = null ,$status = 200){
        return response()->json([
            'code' => $status,
            'message' => $message,
            'content' => $content,
        ], $status);
    }
    /**
     * @param mixed $message
     * @param integer $status
     * @param null $content
     * 
     * @return json
     */
    public static function respondError($message ,$status = 500){
        $message = \is_array($message)?$message:[$message];
        return response()->json([
            'code' => $status,
            'message' => $message,
            'content' => null
        ], $status);
    }
}