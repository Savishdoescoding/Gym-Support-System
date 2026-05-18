<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseSeeder extends Seeder
{
    public function run(): void
{
    $path = base_path('database/data/exercises.json');

    echo "File exists: " . (file_exists($path) ? 'YES' : 'NO') . "\n";

    $exercises = json_decode(file_get_contents($path), true);

    echo "Total exercises: " . count($exercises) . "\n";

    // Clear first
    DB::table('exercises')->truncate();

    foreach ($exercises as $exercise) {
        DB::table('exercises')->insert([
            'name'         => $exercise['name'] ?? 'Unknown',
            'category'     => $exercise['category'] ?? null,
            'muscle'       => !empty($exercise['primaryMuscles']) ? $exercise['primaryMuscles'][0] : null,
            'equipment'    => $exercise['equipment'] ?? null,
            'instructions' => !empty($exercise['instructions']) ? implode(' ', $exercise['instructions']) : null,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);
    }

    echo "Done!\n";
}
}
