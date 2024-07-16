

<x-dynamic-component :component="Auth::check() ? 'appLayout' : 'guestLayout'">
    <x-slot name="header">{{ $post->title }}</x-slot>
    <div class="p-6 my-3 max-w-6xl m-auto">
        <article>
            <h1 class="text-4xl text-center mb-4 font-extrabold text-gray-900 dark:text-white">{{ $post->title }}</h1>
            <p class="text-justify">{{ $post->content }}</p>
        </article>
        
        <div class=" flex rounded-md  justify-center   mt-4 ">
        <a href="/" aria-current="page" class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
            Inicio
            </a>
            @can('update', $post)
                <a href="/posts/{{ $post->id }}/edit" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                    Editar
                </a>
            @endcan
            @can('update', $post)
            <a href="#" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
            <form action="/posts/{{ $post->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button onclick="return confirm('¿Estas seguro de borrar este post?')">Eliminar</button>
            </form>
            </a>
            @endcan
        </div>
        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

     

        @if(!$comments->isEmpty())
        <h4>Comentarios</h4>
        <div class="border border-gray-100 rounded-lg shadow p-6">
            @foreach ($comments as $comment)
                <div class="my-2">
                    {{ $comment->content }}
                </div>
                <small>{{ $comment->name }}</small>
                <hr>
            @endforeach
        </div>
        
    @else
        <p>No hay comentarios disponibles.</p>
    @endif
    @if (Auth()->check())
    <div>
        <h3>Escribe tu comentario</h3>
        <form class="max-w-sm mx-auto" action="/posts/{{ $post->id}}/comments" method="POST">
            @csrf
            <div class="mb-5">
                <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name">
            </div>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comentario</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="content">
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
        </form>
  
    </div>
    @else
    <p class="text-center mt-2 text-red-500">Por favor, <a href="{{ route('login') }}" class="text-indigo-500 underline">inicia sesión</a> para escribir un comentario.</p>
@endif
    </div>
</x-dynamic-component>