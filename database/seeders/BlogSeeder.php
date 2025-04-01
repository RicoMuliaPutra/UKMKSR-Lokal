<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        Blog::factory()->create([
            "title"       => "APEL GABUNGAN",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque earum similique voluptas, unde repudiandae, id totam at consequuntur eos, ex tenetur. Possimus nihil eaque ad.",
            "images"      => "img/blogseed.jpg",
            "created_at"  => Carbon::now(),
        ]);
    }
}
