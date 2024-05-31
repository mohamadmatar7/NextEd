<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LessonAssignment extends Component
{
    public $title;
    public $description;
    public $details;
    public $notes;
    public $attachments;
    public $videoUrl;
    public $adminLink;
    public $adminText;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $description, $details = [], $notes = null, $attachments = [], $videoUrl = null, $adminLink = null, $adminText = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->details = $details;
        $this->notes = $notes;
        $this->attachments = $attachments;
        $this->videoUrl = $videoUrl;
        $this->adminLink = $adminLink;
        $this->adminText = $adminText;
    }



    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.lesson-assignment');
    }
}
