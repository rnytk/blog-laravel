<x-dynamic-component :component="Auth::check() ? 'appLayout' : 'guestLayout'">
    <x-slot name="header">Bienvenidos</x-slot>
    @foreach ($posts as $post)
      <a href="/posts/{{ $post->id }}" class="  block max-w-4xl m-auto p-6 my-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }} </h5>
      <p class="font-normal text-gray-700 dark:text-gray-400">{{ $post->excerpt }}</p>
        </a>
    @endforeach

</x-dynamic-component>

