<?php

namespace App\Http\Controllers\Api;

use App\Models\Dormitory;
use Illuminate\Http\Request;

class DormitoriesController extends Controller
{
    public function index()
    {
        $dorms = Dormitory::with('allChildrenDorms')->where('is_unit_building','1')->get();
        return $this->response->array($dorms)->setStatusCode(201);
    }

    public function show($id ,Dormitory $dormitory)
    {
        $name = $this->getDormName($id);

        $data = [
            'dorm_name' => $name,
            'status_code' => '201'
        ];

        return $this->response->array($data)->setStatusCode(201);
    }

    /**
     * 根据宿舍 ID 拼装宿舍名称
     * @param $id
     * @return string
     */
    public function getDormName($id)
    {
        $dormitory = Dormitory::findOrFail($id);
        $building = $dormitory->parentDorm;
        $unit = $building->parentDorm->dorm_name;
        $name = $unit.$building->dorm_name.$dormitory->dorm_name;

        return $name;
    }
}
