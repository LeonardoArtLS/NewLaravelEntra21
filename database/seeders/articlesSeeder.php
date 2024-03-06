<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class articlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("articles")->insert([
            "title" => "Artigo sobre pesca",
            "preview" => "preview do artigo",
            "text" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi inventore voluptatibus tempora omnis quas. Repellat earum minima numquam dolorem fugit modi temporibus architecto animi odit minus amet, voluptatibus neque ipsa.",
            "author" => "Leonardo",
            "directory" => "1707516000",
            "date" => "2024-02-09 19:38:00",
            "from_category" => 1,

        ]);
    }
}
