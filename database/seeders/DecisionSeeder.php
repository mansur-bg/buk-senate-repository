<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DecisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $filename='decisions';
      $seeds = file_get_contents(base_path('database/jsons/'.$filename.'.json'));
      $seeds = json_decode($seeds, true);
      $data =[];
      foreach ($seeds as $item) {
        foreach ($item as $key => $value) {
          if ($value === "NULL")
            $item[$key] = NULL;
        }
        $data[] = $item + ['created_at' => now()->toDateTimeString(), 'updated_at' => now()->toDateTimeString(),];
      }

      $length = 1000;
      foreach(array_chunk($data, $length) as $chunk){
        \App\Models\Decision::insert($chunk);
      }
    }
}
