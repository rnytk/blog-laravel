<x-app-layout :title="'Editar post'"> 

    <div class="min-h-screen bg-gray-100 py-4 flex flex-col justify-center sm:py-10">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-8 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-xl mx-auto">
                    <form class="form" action="/posts/{{$post->id  }}" method="POST">
                        <div class="text-center">
                            <h2 class="text-2xl font-semibold">Editar Post</h2>
                        </div>
                        @csrf
                        @method('PATCH')
        
                        <div class="flex flex-col">
                            <label>Título</label>
                            <input class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="title" value="{{ $post->title }}">
                            @error('title')
                                <div class="text-red-500 text-xs"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label>Resumen</label>
                            <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="excerpt" id="" cols="30" rows="4" >{{ $post->excerpt }}</textarea>
                            @error('excerpt')
                                <div class="text-red-500 text-xs"> {{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="flex flex-col">
                            <label>Contenido</label>
                            <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="content" id="" cols="30" rows="6" >{{ $post->content }}</textarea>
                            @error('content')
                                <div class="text-red-500 text-xs"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex">
                            <div class="m-2">
                                <button type="submit" class="bg-blue-500 text-white rounded-md px-2 py-1">Actualizar</button>
                            </div>
                            <div class="m-2">
                                <a href="/posts/{{ $post->id }}">
                                    <button class="bg-black text-white rounded-md px-2 py-1">Cancelar</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
