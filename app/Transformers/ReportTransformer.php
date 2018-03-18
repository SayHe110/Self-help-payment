<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/18
 * Time: 13:18
 */

namespace App\Transformers;


use App\Models\Report;
use League\Fractal\TransformerAbstract;

class ReportTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['user'];

    public function transform(Report $report)
    {
        return [
            'id' => $report->id,
            'user_id' => $report->user_id,
            'title' => $report->title,
            'reports' => $report->reports,
            'description' => $report->description,
            'is_solve' => $report->is_solve,
            'solver' => $report->solver,
            'created_at' => $report->created_at->toDateTimeString(),
            'updated_at' => $report->updated_at->toDateTimeString(),
        ];
    }

    public function IncludeUser(Report $report)
    {
        return $this->item($report->user, new UserTransformer());
    }
}