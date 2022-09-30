<x-app-layout>
    {{-- <x-slot name="header"><div class="container mx-auto w-3/6"><h1 class="text-3xl text-red-400 font-bold">{{$blog->title}}</h1></div></x-slot> --}}
    <div class="container mx-auto w-3/5 pb-32">
        <div class="mt-16 md:flex md:justify-between items-center">
            <h1 class="text-3xl text-red-400 font-bold">{{$blog->title}}</h1> 
            @if(Auth::user() && $blog->user->id == Auth::user()->id)
                <a class="{{$blog->published ? 'text-red-400' : 'text-orange-400'}} outline outline-offset-2 outline-1 px-2 md:ml-4" href="/blog/{{$blog->id}}/edit">{{__('Edit')}}</a>
            @endif
        </div>
        <h1 class="text-lg text-slate-600 font-light">{{$blog->sub_title}}</h1>
        <p class="font-thin text-sm text-slate-400">{{ $blog->updated_at->format('m/d/Y') }} - {{ $blog->user->name }}</p>
        
        <div class="py-16">{!! $blog->body !!}</div>
        @if(Auth::user())
        <form method="POST" action="{{ route('comment', ['blog' => $blog] ) }}">
            @csrf
            <x-textarea placeholder="Add Comment" name="body" class="block w-full"></x-textarea>
            <div class="flex my-2 justify-end"><x-button>Comment</x-button></div>
        </form>
        @else
            <p class="text-center"><a class="text-red-400 underline underline-offset-4" href="/login">Login</a> to Add Comments</p>
        @endif
        <div class="border-2 hadow-sm border-gray-300 rounded-lg w-full p-2 mt-2">
            @if($comments->isEmpty())
                <p class="text-center">No Comments added on this blog</p>
            @endif
            @foreach ($comments as $comment)
                <div class="p-4 bg-white my-2 rounded-lg">
                    <h2 class="text-red-400 font-bold">{{ $comment->user->name }}</h2>
                    <p class="px-2 italic">{{ $comment->body }}</p>
                    <p class="text-right text-xs">{{$comment->updated_at->format('m/d/Y')}}</p>
                    
                </div>
            @endforeach
            @if($comments->hasPages())
                <div class="pagination-wrapper">
                    {{ $comments->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>