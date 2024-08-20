@php
/** @var \App\Models\Course $course */
/** @var \App\Models\CourseRevisions $revision */
$revision = $course->latestRevision;
@endphp

<div x-data="{ hover: false }"
     class="h-[350px] md:h-[300px] md:w-[220px] card card-compact bg-base-100 card-bordered border-neutral-content overflow-hidden"
     @mouseenter="hover = true" @mouseleave="hover = false">
    <figure class="h-32 overflow-hidden">
        <img src="https://picsum.photos/seed/{{ $revision->id  }}/300/300" alt="Cover Image" class="w-full h-full object-cover">
    </figure>
    <div class="card-body justify-between" x-show="!hover">
        <h2 class="card-title line-clamp-2">{{ $revision->title }}</h2>
        <div class="card-actions flex md:block space-y-2">
            <div class="flex-grow">
                <div class="badge badge-outline">tag one</div>
                <div class="badge badge-outline">tag two</div>
            </div>
            <p class="text-sm text-gray-500 flex-none">{{ $revision->modified_at }}</p>
        </div>
    </div>
    <!-- Hover Mask -->
    <div class="card-body absolute inset-0 bg-black bg-opacity-20 flex flex-col justify-between p-4 cursor-help"
         x-show="hover" x-cloak>
        <div class="h-32"></div>
        <div class="-mt-4">
            <p class="text-sm"><span class="font-bold">Enrolments:</span> {{ $revision?->enrolment_count ? $revision->enrolment_count : 0 }}</p>
            <p class="text-sm"><span class="font-bold">Modified:</span>  {{ $revision->updated_at->format('d, M Y') }}</p>
            <p class="text-sm"><span class="font-bold">Status:</span>  <span class="text-blue-700">{{ $revision->published_at ? 'Live' : 'Draft' }}</span></p>
        </div>
        <div class="flex-grow"></div>
        <div class="card-actions">
            <a href="{{ route('courses.create', ['course' => $course,]) }}" class="btn btn-success w-full text-white mt-2">Edit course</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        // Directive: x-hover
        Alpine.directive('hover', (el, { expression }, { evaluate }) => {
            // Default hover classes (you can customize these)
            let defaultClasses = 'transform scale-105 shadow-lg';

            // Evaluate the expression (if any) to get custom classes
            let hoverClasses = expression ? evaluate(expression) : defaultClasses;

            // Add event listeners for mouseenter and mouseleave
            el.addEventListener('mouseenter', () => {
                el.classList.add(...hoverClasses.split(' '));
            });

            el.addEventListener('mouseleave', () => {
                el.classList.remove(...hoverClasses.split(' '));
            });
        });
    });
</script>
