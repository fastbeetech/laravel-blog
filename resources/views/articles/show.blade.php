<x-layout>
    <section class="container mx-auto mt-5 p-5 max-w-6xl">

        <h1 class="p-5 text-2xl font-bold">Show Articles</h1>
        <div>
        </div>
        <article class="card mt-10 p-5">
            <img src="{{ asset('storage/' . $article->image) }}" alt="" class="w-full">
            <h1 class="text-2xl my-2 capitalize text-black">{{ $article->title }}</h1>
            <p class="text-base">{!! $article->body !!}</p>
            <div class="flex justify-between">
                <span>Article by: {{ $article->user->name }}</span>
                <span class="text-sm">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    {{ $article->created_at }}
                </span>
            </div>

            @auth
                @if (auth()->user()->id == $article->user_id)
                    <div class="py-3">
                        <div class="float-right">
                            <a class="mr-5" href="{{ route('articles.edit', $article->id) }}"> <i
                                    class="mr-1 fa fa-edit text-indigo-500" aria-hidden="true"></i>Edit</a>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn"><i class="mr-1 fa fa-trash-o text-red-500" aria-hidden="true"></i>
                                    Delete</button>
                            </form>

                        </div>
                    </div>
                @endif
            @endauth


        </article>
    </section>
</x-layout>
