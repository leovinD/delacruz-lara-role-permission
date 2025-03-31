<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ $tag->tag_name }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('tags.edit', $tag) }}"
                   class="px-4 py-2 text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                    Edit
                </a>
                <form action="{{ route('tags.destroy', $tag) }}" method="POST"
                      onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p><strong>Slug:</strong> {{ $tag->tag_slug }}</p>
                    <p class="mt-4"><strong>Description:</strong></p>
                    <div class="prose max-w-none">
                        {!! $tag->tag_desc !!}
                    </div>

                    <div class="pt-4 mt-6 text-gray-600 border-t">
                        <p><strong>Created At:</strong> {{ $tag->created_at->format('M d, Y') }}</p>
                        <p><strong>Updated At:</strong> {{ $tag->updated_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</x-app-layout>
=======
</x-app-layout>
>>>>>>> f3d27d2b564292000d192cbc02b99b7939146628
