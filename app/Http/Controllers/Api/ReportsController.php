<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ReportRequest;
use App\Models\Report;
use App\Transformers\ReportTransformer;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function store(ReportRequest $request, Report $report)
    {
        $report->fill($request->all());

        // 如果匿名则保存用户 ID
        if(! $request->anonymous)
            $report->user_id = $this->user()->id;

        $report->save();

        return $this->response->item($report, new ReportTransformer());
    }
}
