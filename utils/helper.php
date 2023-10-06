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
    if (!isset($value)) {
        throw new Exception("The field '$field' not can null");
    }
}

function _str($value, $field)
{
    if (!is_string($value)) {
        throw new Exception("The field '$field' need be string");
    }
}
