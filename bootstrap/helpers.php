<?php

function is_first_login($student_id)
{
    $user = \App\Models\User::where('student_id', $student_id)->get()->toArray();
    return $user;
}