<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = config('project');

        //elimina tutti i project prima del seed
        Project::truncate();

        foreach($projects as $project){

            

            //type casuale fra quelli inseriti nell'array
            $type = Type::inRandomOrder()->first();
            
            $newProject = new Project();

            $newProject->title = $project['title'];
            //assegnazione type a type_id
            $newProject->type_id = $type->id;
            $newProject->slug = Str::slug($newProject->title, '-');
            $newProject->description = $project['description'];
            $newProject->start_date = $project['start_date'];
            $newProject->end_date = $project['end_date'];
            $newProject->completed = $project['completed'];
            $newProject->created_by = $project['created_by'];
            $newProject->budget = $project['budget'];

            $newProject->save();
        }
    }
}
