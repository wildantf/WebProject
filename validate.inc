<?php

function validateUserName(&$errors, $field_list, $field_name) {
    if (!preg_match("/^[a-zA-Z ]*$/", $field_list[$field_name]))  
        $errors[$field_name] = 'must contain alphabets only';
}
function validateEmail(&$errors, $field_list, $field_name) {
    if (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL))  
        $errors[$field_name] = 'invalid email address';
} 
function validatePassword(&$errors, $field_list, $field_name) {
    if (!preg_match("/\w{6,20}/", $field_list[$field_name])) 
        $errors[$field_name]= 'must contain min 6 digit';
    else if (!preg_match("/[0-9]/", $field_list[$field_name]))  
        $errors[$field_name] = 'must contain number';
    if(!preg_match("/\w{6,20}/", $field_list[$field_name])&&!preg_match("/[0-9]/", $field_list[$field_name]))
     $errors[$field_name]= 'must contain min 6 digit and contain number';
}
function validateMatchPass(&$errors, $field_list, $field_name){
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) 
        $errors[$field_name] = 'required';
    else if ($field_list['password']!==$field_list[$field_name])
        $errors[$field_name] = 'do not match';
}
function validatePhotoProfile(&$errors,$field_list,$field_name){
    if($field_list[$field_name]['size']>1044070){
        $errors[$field_name]='file maksimal berukuran 1mb';
    }
}
