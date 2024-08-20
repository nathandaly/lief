<?php

namespace App\Actions\Authoring;

use App\Models\Course;
use App\Models\CourseRevisions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class CreateNewCourse
{
    public function execute(array $courseArray): null|Course
    {
        try {
            // Create the new course.
            $course = Course::create([
                'created_by' => Auth::id(), // Assuming the user is authenticated
            ]);

            // Create the first revision for the course.
            CourseRevisions::create([
                'course_id' => $course->id,
                'title' => $courseArray['title'],
                'modified_by' => Auth::id(),
                'changed_attributes' => json_encode($courseArray),
            ]);
        } catch (Throwable $exception) {
            Log::error($exception->getMessage());
            return null;
        }

        return $course;
    }
}
