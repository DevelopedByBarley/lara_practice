<x-layout>


    <div>

        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">From the blog</h2>
                    <p class="mt-2 text-lg leading-8 text-gray-600">Learn how to grow your business with our expert
                        advice.</p>
                </div>
                <div class="grid grid-cols-3">
                    @if (count($posts) === 0)
                        <h1>No Post here...</h1>
                    @else
                        @foreach ($posts as $post)
                            <div
                                class="mx-auto mt-10 grid max-w-2xl grid-cols-3 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                                <article class="flex max-w-xl flex-col items-start justify-between">
                                    <div class="flex items-center gap-x-4 text-xs">
                                        <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at }}</time>
                                        <a href="#"
                                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Marketing</a>
                                    </div>
                                    <div class="group relative">
                                        <h3
                                            class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                            <a href="#">
                                                <span class="absolute inset-0"></span>
                                                {{ $post->name }}
                                            </a>
                                        </h3>
                                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                                            {{ $post->content }}
                                        </p>
                                    </div>
                                    <div class="relative mt-8 flex items-center gap-x-4">
                                        <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="" class="h-10 w-10 rounded-full bg-gray-50">
                                        <div class="text-sm leading-6">
                                            <p class="font-semibold text-gray-900">
                                                <a href="#">
                                                    <span class="absolute inset-0"></span>
                                                    {{ $post->user->name }}
                                                </a>
                                            </p>
                                            <p class="text-gray-600"> {{ $post->user->email }}</p>
                                            @can('delete', $post)
                                                <form action="/posts/{{ $post->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="border px-3 py-2 bg-slate-800 text-white cursor-pointer">Delete</button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                </article>

                                <!-- More posts... -->
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        </div>













        @if (count($posts) === 0)
            <h1>No Post here...</h1>
        @else
            @foreach ($posts as $post)
                <div class="bg-red-500">
                    <h3 class="font-bold text-3xl">
                        {{ $post->name }}
                    </h3>
                    <p>
                        {{ $post->content }}
                    </p>
                    @can('delete', $post)
                        <form action="/posts/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="border px-3 py-2 bg-slate-800 text-white cursor-pointer">Delete</button>
                        </form>
                    @endcan

                </div>
            @endforeach
        @endif
    </div>
</x-layout>
