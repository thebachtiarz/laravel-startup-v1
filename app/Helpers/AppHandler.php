<?php

/**
 * use library
 */

use Illuminate\Support\Str;

/** */

/**
 * response status
 *
 * @return void
 */
function successResponse($msg, ...$response_data)
{
    return ['status' => 'success', 'message' => $msg, 'response_data' => $response_data];
}

function infoResponse($msg)
{
    return ['status' => 'info', 'message' => $msg];
}

function errorResponse($msg)
{
    return ['status' => 'error', 'message' => $msg];
}

function customResponse($stat, $msg, ...$response_data)
{
    return ['status' => $stat, 'message' => $msg, 'response_data' => $response_data];
}
/** */

/**
 * create new user code
 *
 * @return void
 */
function createNewUserCode()
{
    return Str::random(64);
}
