<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Tag') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('tags.update', $tag) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="tag_name" :value="__('Tag Name')" />
                            <x-text-input id="tag_name" name="tag_name" type="text" class="block w-full mt-1"
                                :value="old('tag_name', $tag->tag_name)" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('tag_name')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="tag_slug" :value="__('Tag Slug')" />
                            <x-text-input id="tag_slug" name="tag_slug" type="text" class="block w-full mt-1"
                                :value="old('tag_slug', $tag->tag_slug)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('tag_slug')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="tag_desc" :value="__('Description')" />
                            <textarea id="tag_desc" name="tag_desc" rows="4"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('tag_desc', $tag->tag_desc) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('tag_desc')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update Tag') }}</x-primary-button>

                            <a href="{{ route('tags.index') }}"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>