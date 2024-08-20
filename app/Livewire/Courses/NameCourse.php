<?php

namespace App\Livewire\Courses;

use App\Actions\Authoring\CreateNewCourse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

#[Title('Create Course')]
class NameCourse extends Component
{
    public string $courseTitle = '';

    public bool $created = false;

    public int $maxLength = 255;

    public function addTag()
    {
        // Logic to add a tag
    }

    public function createCourse(CreateNewCourse $createNewCourse): RedirectResponse|Redirector
    {
        if ($course = $createNewCourse->execute(['title' => $this->courseTitle])) {
            return to_route('courses.create', [
                'course' => $course,
            ]);
        }
    }

    public function updatedCourseTitle()
    {
        // This function will be called on every keystroke
    }

    public function render(): Factory|Application|View
    {
        return view('livewire.courses.name-course', [
            'remainingCharacters' => $this->maxLength - strlen($this->courseTitle),
        ]);
    }
}
