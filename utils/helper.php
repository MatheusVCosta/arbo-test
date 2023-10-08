<?php

function prepare_array_to_string(array $array)
{
    $count = count($array);

    $array = [];
    $array = array_fill(0, $count, "?");

    return implode(",", $array);
}

function prepare_date_to_insert()
{
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    return [
        "created_at" => $created_at,
        "updated_at" => $updated_at
    ];
}

function encrypt_password($password)
{
    // encrypt password with crypt()
    $new_password = password_hash($password, PASSWORD_DEFAULT);
    return $new_password;
}


function _not_null($value, $field)
{
    if (!isset($value) || empty($value)) {
        $ex = new Exception("The field '$field' not can null", 500);
        _exception_response_json($ex, ["field" => $field, "type_error" => "field_null"]);
        return $ex;
    }
    return true;
}

function _str($value, $field)
{
    if (!is_string($value)) {
        $type = gettype($value);
        $ex = new Exception("The field '$field' is a STRING not $type", 500);
        _exception_response_json($ex);
        return $ex;
    }
    return true;
}
function _int($value, $field)
{
    if (!is_numeric($value)) {
        $type = gettype($value);
        $ex = new Exception("The field '$field' is a INT not $type", 500);
        _exception_response_json($ex);
        return $ex;
    }
    return true;
}

function _exception_response_json($ex, $args = [])
{
    $exception = [
        'message'    => $ex->getMessage(),
        'status'     => $ex->getCode(),
        'line'       => $ex->getLine(),
        'trace'      => $ex->getTrace(),
    ];
    $exception = array_merge($exception, $args);
    http_response_code(
        is_string($ex->getCode() && is_numeric($ex->getCode()) ? intval($ex->getCode()) : intval($ex->getCode()))
    );
    header('Content-type: application/json');
    print_r(json_encode($exception));
    exit;
}

function response($args = [])
{
    http_response_code(200);
    header('Content-type: application/json');
    print_r(json_encode($args));
    exit;
}

function responseArr($args = [])
{
    http_response_code(200);
    header('Content-type: application/json');
    print_r($args);
    exit;
}


function _create_auth_session($args = [])
{
    $_SESSION['user_authenticated'] = [
        'logged'    => true,
        'userId'    => $args['id'],
        'userName'  => $args['name'],
        'userEmail' => $args['email'],
    ];
}
function validate($key, $value, $rules_user)
{
    $rules = isset($rules_user[$key]) ? $rules_user[$key] : "";
    if ($rules != "") {
        foreach ($rules as $rule) {
            $rule = "_$rule";
            $is_ok = call_user_func_array($rule, [$value, $key]);
            if (!$is_ok) {
                return false;
            }
        }
    }
    return true;
}

function prepareArrayForDatabase(array $args, $rules)
{
    if (!isset($args) || empty($args)) {
        $ex = new Exception("Filds needs filled!", 500);
        _exception_response_json($ex);
    }

    foreach ($args as $key => $value) {
        $valid = validate($key, $value, $rules);
        if (!$valid) {
            throw new Exception("Error");
        }
    }
    return array_merge($args, prepare_date_to_insert());
}

function _destroy_session($session_name)
{
    unset($_SESSION[$session_name]);
}
