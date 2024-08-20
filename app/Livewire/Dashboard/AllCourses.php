<?php

namespace App\Livewire\Dashboard;

use App\Models\Course;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class AllCourses extends Component
{
    public $courses = [
        [
            'id' => 1,
            'title' => 'IOSH Managing Safely',
            'modified_at' => '02, June 2022',
            'enrolment_count' => '1482',
            'published_at' => '14, July 2022'
        ],
        [
            'id' => 2,
            'title' => 'IOSH Working Safely',
            'modified_at' => '24, March 2020',
            'enrolment_count' => '882',
            'published_at' => '02, May 2020'
        ],
        [
            'id' => 3,
            'title' => 'Fire Awareness',
            'modified_at' => '08, June 2024',
            'enrolment_count' => '64',
            'published_at' => '10, June 2024'
        ],
        [
            'id' => 4,
            'title' => 'Hazard Awareness',
            'modified_at' => '12, Aug 2024',
            'enrolment_count' => '8',
            'published_at' => '14, Aug 2024'
        ],
    ];

    public function selectCourse()
    {
        dd('bob');
    }

    public function render(): Factory|Application|View
    {
        $this->courses = Course::withLatestRevision()->get();

        return view('livewire.dashboard.all-courses');
    }
}
