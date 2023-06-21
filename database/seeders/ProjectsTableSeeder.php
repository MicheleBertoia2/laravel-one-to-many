<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10 ; $i++) {
            $new_project = new Project();
            $new_project->type_id =  Type::inRandomOrder()->first()->id;
            $new_project->title = $faker->word(3);
            $new_project->slug = Project::generateSlug($new_project->title);
            $new_project->description = $faker->paragraph();
            $new_project->image_path = 'https://d3kjluh73b9h9o.cloudfront.net/original/3X/f/4/f4343b1a17c43af437f2dc8984cb5e07e3525998.png';
            $new_project->project_link = $faker->word();
            $new_project->collaborators = $faker->word();
            $new_project->frameworks = $faker->word(2);
            $new_project->prog_languages = $faker->word(2);
            $new_project->date_started = $faker->date();
            $new_project->date_ended = $faker->date();
            $new_project->save();

        }
    }
}
