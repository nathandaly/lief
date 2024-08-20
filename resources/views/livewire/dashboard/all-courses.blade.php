<div class="container mx-auto p-2">
    <h2 class="text-lg text-gray-800 dark:text-gray-200 leading-tight flex-1 mb-10">
        {{ __('Recent activity') }}
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
        @forelse ($courses as $course)
            <x-ui.course-card :course="$course" />
        @empty
            <p>No users</p>
        @endforelse
    </div>
</div>
