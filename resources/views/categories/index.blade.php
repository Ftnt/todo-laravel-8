@extends('app')

@section('content')
    <div class="max-w-xl m-auto py-2 mt-4 border-2 rounded-lg">
        <form class="p-3 mb-5" action="{{ route ('categories.store') }}" method="POST">
            @csrf

            @if(session ('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 mb-3" role="alert">
                    {{ session ('success') }}
                </div>
            @endif
            @error('name')
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3" role="alert">
                {{ $message }}
            </div>
            @enderror

            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Titulo de la Categoria</label>
                <input type="text" id="tarea" name="name" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nombre categoria" required="">
            </div>
            <div class="mb-4">
                <label for="color" class="block mb-2 text-sm font-medium text-gray-900">Color</label>
                <input type="color" id="tarea" name="color" class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1" placeholder="Nombre tarea" required="">
            </div>
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-1.5 text-center">Crear nueva categoria</button>
        </form>

        @foreach($categories as $category)
            <div class="flex flex-col py-2 px-4">
                <div class="flex items-center justify-between">
                    <div class="flex gap-3">
                        <h2 class="text-md font-semibold text-blue-500 ">{{ $category->name }}</h2>
                        <div class="text-gray-700 px-2 rounded" style="background: {{$category->color}}">{{ $category->color }}</div>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('categories.show', $category->id) }}" class="text-gray-200 bg-green-500 px-2 py-1 rounded text-sm">Editar</a>
                        <form action="{{ route('categories.destroy', [$category->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="text-gray-200 bg-red-500 px-2 py-1 rounded text-sm">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
