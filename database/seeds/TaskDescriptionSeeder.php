<?php

use App\TaskModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class TaskDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_models')->delete();
        $json=File::get("database/data/test_data.json");
        $data=json_decode($json);
        foreach ($data as $datum){
            TaskModel::create(array(
                'id'=>$datum->id,
                'descr'=>$datum->descr
            ));
        }
    }
}
