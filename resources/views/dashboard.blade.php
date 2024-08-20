<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex-1">
                {{ __('Dashboard') }}
            </h2>
            <a class="btn btn-success text-white rounded-full" href="{{ route('courses.new') }}">
                <x-icons.sharp.plus />
                Create course
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                @livewire('dashboard.all-courses')
            </div>
        </div>
    </div>
</x-app-layout>
