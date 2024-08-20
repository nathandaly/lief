<div class="flex flex-col items-center h-screen mt-[100px]">
    <div class="bg-white p-8 max-w-lg w-full">
        <h1 class="text-2xl font-bold text-center mb-4">Create your course</h1>
        <div class="mb-2">
            <label class="form-control w-full">
                <x-input wire:model.live.debounce.250ms="courseTitle" maxlength="{{ $maxLength }}" type="text" class="w-full" placeholder="Name your course..." />
                <div class="label mt-2">
                    <button class="badge badge-outline" wire:click="addTag">+ Add tag</button>
                    <span class="label-text-alt font-semibold text-info">{{ $remainingCharacters }} characters left</span>
                </div>
            </label>
        </div>
        <div class="flex justify-between mt-6">
            <button class="btn btn-primary btn-block mr-2" wire:click="createCourse">Create course</button>
        </div>
    </div>
</div>
