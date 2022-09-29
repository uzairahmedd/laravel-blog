<x-app-layout>
    <div class="container md:w-full lg:w-3/5 mx-auto p-16">
        {{-- Empty blog list message --}}
        @if($blogs->isEmpty())
            <p class="text-center">That's pretty much it !</p>
        @endif
        {{-- Success message --}}
        @if (\Session::has('success'))
            <p class="text-left mb-8 text-green-600 bg-green-200 p-1 rounded">{{ Session::get('success') }}</p>
        @endif

        @foreach ($blogs as $blog)
            <div class="mb-8">
                <span><a class="text-3xl {{$blog->published ? 'text-red-400' : 'text-orange-400'}} font-bold" href="/blog/{{$blog->id}}">{{$blog->title}}</a> <small class="text-slate-400">{{!$blog->published ? '(Unpublished)' : ''}}</small> </span>
                <h1 class="text-lg text-slate-600 font-light">{{$blog->sub_title}}</h1>
                <p class="font-thin text-sm text-slate-400">{{ $blog->updated_at->format('m/d/Y') }}</p>
                @if(Auth::user() && $blog->user->id == Auth::user()->id)
                    <div class="mt-2">
                        <a class="{{$blog->published ? 'text-red-400' : 'text-orange-400'}} decoration-solid underline underline-offset-4" href="blog/{{$blog->id}}/edit">{{__('Edit')}}</a> | 
                        <a class="{{$blog->published ? 'text-red-400' : 'text-orange-400'}} decoration-solid underline underline-offset-4" href="{{ route('blog.destroy', ['blog' => $blog]) }}">{{__('Delete')}}</a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</x-app-layout>