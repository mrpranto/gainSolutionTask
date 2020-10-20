<?php

namespace Database\Seeders;

use App\Models\Segment;
use App\Models\SegmentLogic;
use Illuminate\Database\Seeder;

class SegmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $segments = [

            'segment_name' => 'test_name',
            'segment_logic' => [
                1 => [
                    ['first_name', 'contains', 'mr'],
                    ['last_name', 'is', 'pranto'],
                    ['birth_day', 'before', '2020-10-20'],
                ],
                2 => [
                    ['email', 'is', 'email@email.com'],
                    ['created_at', 'between', '2020-10-20, 2020-10-21'],
                ]
            ]
        ];

        $segmentId = Segment::create([

            'segment_name' => $segments['segment_name']

        ])->id;


        $segmentLogicData = [];

        foreach ($segments['segment_logic'] as $key => $segment_logic)
        {
            foreach ($segment_logic as $subKey => $logic)
            {
                $segmentLogicData[] = [

                    'segment_id' => $segmentId,
                    'batch' => $key,
                    'logic_name' => $segment_logic[$subKey][0],
                    'operator' => $segment_logic[$subKey][1],
                    'value' => $segment_logic[$subKey][2],
                    'created_at' => now(),
                    'updated_at' => now(),

                ];
            }
        }

        SegmentLogic::query()->insert($segmentLogicData);

    }
}
