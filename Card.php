<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public string $title;
    public string $excerpt;
    public int    $id;
    public ?string $image;
    public string $date;

    public function __construct(
        string $title   = '',
        string $excerpt = '',
        int    $id      = 0,
        ?string $image  = null,
        string $date    = ''
    ) {
        $this->title   = $title;
        $this->excerpt = $excerpt;
        $this->id      = $id;
        $this->image   = $image;
        $this->date    = $date;
    }

    public function render()
    {
        return view('components.card');
    }
}
