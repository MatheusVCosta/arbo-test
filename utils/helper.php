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

function validate($key, $value, $rules_user)
{
    $rules = $rules_user[$key];

    foreach ($rules as $rule) {
        $rule = "_$rule";
        call_user_func_array($rule, [$value, $key]);
    }
}

function _not_null($value, $field)
{
    if (!isset($value) || empty($value)) {
        $ex = new Exception("The field '$field' not can null", 500);
        _exception_response_json($ex, ["field" => $field, "type_error" => "field_null"]);
    }
}

function _str($value, $field)
{
    if (!is_string($value)) {
        $ex = new Exception("The field '$field' not can null", 500);
        _exception_response_json($ex);
    }
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
    http_response_code($ex->getCode());
    header('Content-type: application/json');
    print(json_encode($exception));
    return json_encode($exception);
    exit;
}


function _http_response_json($args = [])
{
    http_response_code(200);
    header('Content-type: application/json');
    print(json_encode($args));
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

function _destroy_session($session_name)
{
    unset($_SESSION[$session_name]);
}
