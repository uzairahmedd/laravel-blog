<x-app-layout>
    {{-- <x-slot name="header"><div class="container mx-auto w-3/6"><h1 class="text-3xl text-red-400 font-bold">{{$blog->title}}</h1></div></x-slot> --}}
    <div class="container mx-auto w-3/5">
        <div class="mt-16 md:flex md:justify-between items-center">
            <h1 class="text-3xl text-red-400 font-bold">{{$blog->title}}</h1> 
            @if(Auth::user() && $blog->user->id == Auth::user()->id)
                <a class="{{$blog->published ? 'text-red-400' : 'text-orange-400'}} outline outline-offset-2 outline-1 px-2 md:ml-4" href="blog/{{$blog->id}}/edit">{{__('Edit')}}</a>
            @endif
        </div>
        <h1 class="text-lg text-slate-600 font-light">{{$blog->sub_title}}</h1>
        <p class="font-thin text-sm text-slate-400">{{ $blog->updated_at->format('m/d/Y') }} - {{ $blog->user->name }}</p>
        
        <div class="py-16">{!! $blog->body !!}</div>
    
    </div>
    <div>

    </div>
</x-app-layout>