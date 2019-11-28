<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AllowedLinkController extends Controller
{
    public function getAllowedLink(Request $get)
    {
        $validate = Validator::make($get->all(), [
            '_type' => 'required|alpha_dash'
        ]);
        if ($validate->fails()) {
            return response()->json(errorResponse('bad request!'), 200);
        }
        $httplink = config('app_handler.allowed_link');
        if (auth()->check()) {
            foreach ($httplink as $key => $value) {
                if (($value['type'] == $get->_type) && (($value['auth'] == 'all') || ($value['auth'] == auth()->user()->status))) {
                    $data[] = globalUrlAllowedMap($value);
                }
            }
            return response()->json(successResponse('auth', isset($data) ? $data : []), 200);
        }
        foreach ($httplink as $key => $value) {
            if (($value['auth'] == 'all') && ($value['type'] == $get->_type)) {
                $data[] = globalUrlAllowedMap($value);
            }
        }
        return response()->json(successResponse('no-auth', isset($data) ? $data : []), 200);
    }
}
