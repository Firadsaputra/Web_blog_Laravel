<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- <article class="py-8 max-w-screen-md border-b border-gray-300 shadow-lg rounded-lg">
        <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
            <h2 class="mb-2 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
        </a>
        <div>
            untuk mencari formta penanggalangoogling saja php format date
            gunakan diffForHumans(), untuk menampilkan tanggal yang mudah dibaca oleh manusia
            <a href="/authors/{{$post->author->username}}" class="text-base text-gray-600 hover:underline">{{ $post->author->name }}</a> | 
            
            <a href="/categories/{{ $post->category->slug }}" class="text-base text-gray-600 hover:underline">{{ $post->category->name }}</a> |

            {{ $post['created_at']->diffForHumans() }}
        </div>
        <p class="my-4 font-normal text-gray-700">{{ $post['body'] }}</p>
        <a href="/posts" class="inline-block font-medium text-blue-500 hover:text-blue-700 hover:underline">&laquo; Back</a>
    </article> --}}

    <!-- 
Install the "flowbite-typography" NPM package to apply styles and format the article content: 

URL: https://flowbite.com/docs/components/typography/ 
-->

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <a href="/posts" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                &laquo; Back to All Post
                </a>
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full" src="{{ $post->author->image }}" alt="Jese Leos">
                        <div>
                            <a href="/posts?author={{ $post->author->username }}" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                            <a href='/posts?category={{ $post->category->slug }}'>
                                <p class="text-base text-gray-500 dark:text-gray-400">{{$post->category->name}}</p>
                            </a>
                            <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">{{$post['created_at']->diffForHumans()}}</time></p>
                        </div>
                    </div>
                </address>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{$post['title']}}</h1>
            </header>
            {{ $post['body'] }}
        </article>
    </div>
  </main>
</x-layout>