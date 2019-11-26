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
function successResponse($msg, ...$basedata)
{
    return ['status' => 'success', 'message' => $msg, 'basedata' => $basedata];
}

function infoResponse($msg)
{
    return ['status' => 'info', 'message' => $msg];
}

function errorResponse($msg)
{
    return ['status' => 'error', 'message' => $msg];
}

function customResponse($stat, $msg, ...$basedata)
{
    return ['status' => $stat, 'message' => $msg, 'basedata' => $basedata];
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
