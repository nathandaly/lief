<?php

namespace App\Livewire\Courses;

use App\Models\Course;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Create extends Component
{
    public ?Course $course = null;

    public function mount(Course $course): void
    {
        $this->course = $course;
    }

    public function render(): Application|Factory|View
    {
        return view('livewire.courses.create', [
            'latestRevision' => $this->course->latestRevision,
        ]);
    }
}
