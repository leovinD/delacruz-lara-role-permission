<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="cat_name" :value="__('Category Name')" />
                            <x-text-input id="cat_name" name="cat_name" type="text" class="block w-full mt-1"
                                :value="old('cat_name', $category->cat_name)" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('cat_name')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="cat_slug" :value="__('Category Slug')" />
                            <x-text-input id="cat_slug" name="cat_slug" type="text" class="block w-full mt-1"
                                :value="old('cat_slug', $category->cat_slug)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('cat_slug')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="cat_desc" :value="__('Description')" />
                            <textarea id="cat_desc" name="cat_desc" rows="4"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('cat_desc', $category->cat_desc) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('cat_desc')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update Category') }}</x-primary-button>

                            <a href="{{ route('categories.index') }}"
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
