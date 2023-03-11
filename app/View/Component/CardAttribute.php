<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardAttribute extends Component
{
    protected $status;

    /**
     * Create a new component instance.
     * @param string $status
     * @return void
     */
    public function __construct(string $status)
    {
        $this->status = $status;
    }

    public function render()
    {
        $image = \App\Core\Constants\CardAttribute::image($this->status);
        $label = \App\Core\Constants\CardAttribute::label($this->status);
        $status = $this->status;

        return Inertia::render('Yugioh/Profile/Partials/Attribute', [
            'image' => $image,
            'label' => $label,
            'status' => $status
        ]);
    }
}
