<?php

namespace App\View\Components\Post;

use Illuminate\View\Component;

class Trending extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $trends = collect([
            [ "title" => "Trends 1", "id" => 1],
            [ "title" => "Trends 2", "id" => 2],
            [ "title" => "Trends 3", "id" => 3],
            [ "title" => "Trends 4", "id" => 4],
            [ "title" => "Trends 5", "id" => 5],
         ]);

        return view('components.post.trending', compact('trends'));
    }
}
