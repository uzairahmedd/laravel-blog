<x-app-layout>
    <x-slot name="header"><h1>Write New Blog</h1></x-slot>
    <div class="container mx-auto pb-24">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="/blog">
            @csrf

            <div class="block mt-4">
                <x-label for="title" :value="__('Title')" />
                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
            </div>

            <div class="block mt-4">
                <x-label for="sub_title" :value="__('Subtitle')" />
                <x-input id="sub_title" class="block mt-1 w-full" type="text" name="sub_title" :value="old('sub_title')" autofocus />
            </div>

            <div class="block mt-4">
                <label for="publish" class="inline-flex items-center">
                    <span class="mr-2 text-sm text-gray-600">{{ __('Publish') }}</span>
                    <input id="publish" checked type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="publish">
                </label>
            </div>

            <div class="block mt-4">
                <x-label for="body" :value="__('Body')" />
                <x-forms.tinymce-editor id="body" class="block mt-1 w-full" name="body" :value="old('body')" />
            </div>

            <div class="block mt-4">

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                        {{ __('Publish') }}
                    </x-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>