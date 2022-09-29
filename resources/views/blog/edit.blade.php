<x-app-layout>
    <x-slot name="header"><h1>Edit Blog</h1></x-slot>
    <div class="container mx-auto pb-24">

    <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
    <form method="POST" action="/blog/{{$blog->id}}">
        @method('PUT')
        @csrf

        <div class="block mt-4">
            <x-label for="title" :value="__('Title')" />
            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title') ?? $blog->title" required autofocus />
        </div>

        <div class="block mt-4">
            <x-label for="sub_title" :value="__('Subtitle')" />
            <x-input id="sub_title" class="block mt-1 w-full" type="text" name="sub_title" :value="old('sub_title') ?? $blog->sub_title" autofocus />
        </div>

        <div class="block mt-4">
            <label for="publish" class="inline-flex items-center">
                <span class="mr-2 text-sm text-gray-600">{{ __('Publish') }}</span>
                <input id="publish" {{$blog->published ? 'checked' : '' }} type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="publish">
            </label>
        </div>

        <div class="block mt-4">
            <x-label for="body" :value="__('Body')" />
            <x-forms.tinymce-editor id="body" class="block mt-1 w-full" name="body" :value="old('value')">
                {{$blog->body}}
            </x-forms.tinymce-editor>
        </div>

        <!-- Password -->
        {{-- <div class="mt-4">
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div> --}}
        <div class="block mt-4">

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Update') }}
                </x-button>
            </div>
        </div>
    </form>
    </div>
</x-app-layout>