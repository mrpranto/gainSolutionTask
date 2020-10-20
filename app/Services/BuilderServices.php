<?php


namespace App\Services;


use App\Models\SegmentLogic;
use App\Models\Subscriber;

class BuilderServices
{

    public function indexData()
    {
        $batches = SegmentLogic::get(['batch', 'logic_name', 'operator', 'value'])->groupBy('batch');

        $subscribers = Subscriber::query();

        foreach ($batches as $batch)
        {
            $subscribers->where(function ($builder) use ($batch){

                foreach ($batch as $key => $logic)
                {
                    $clause = $this->clause($key, $logic->operator);

                    $operatorAndValue = $this->getOperatorAndValue($logic->operator, $logic->value);

                    if (array_key_exists("operator", $operatorAndValue)) {

                        $builder->$clause($logic->logic_name, $operatorAndValue['operator'], $operatorAndValue['value']);

                    } else {

                        $builder->$clause($logic->logic_name, $operatorAndValue['value']);
                    }
                }

            });
        }


        $subscribers = $subscribers->simplePaginate(30);

        return $subscribers;
    }


    private function clause($key, $operator)
    {
        if ($key == 0) {
            if ($operator == 'between') {
                return 'whereBetween';
            }

            return 'where';
        }

        if ($operator == 'between') {
            return 'orWhereBetween';
        }

        return 'orWhere';
    }

    private function getOperatorAndValue($operator, $value)
    {
        if ($operator == 'is') {
            return [
                'operator' => '=',
                'value' => $value
            ];
        }

        if ($operator == 'contains') {
            return [
                'operator' => 'LIKE',
                'value' => "%$value%"
            ];
        }

        if ($operator == 'between') {

            $value = explode(', ', $value);

            return [
                'value' => $value
            ];
        }

        if ($operator == 'before') {
            return [
                'operator' => '=',
                'value' => $value
            ];
        }
    }

}
