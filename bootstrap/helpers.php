<?php

use App\Models\User;
use App\Models\Dormitory;

function is_first_login($student_id)
{
    $user = User::where('student_id', $student_id)->get()->toArray();
    return $user;
}

// 根据 dormitory_id 来返回宿舍单元楼、栋别、宿舍号
function getDormitory($dormitory_id)
{
    $dorm = \App\Models\Dormitory::where('dorm_id', $dormitory_id)->first();
    $villa = $dorm->parentDorm;
    $unitBuilding = $villa->parentDorm;
    $dorm_num = $unitBuilding->dorm_name.$villa->dorm_name.$dorm->dorm_name;

    return $dorm_num;
}
