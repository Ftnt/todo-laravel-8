@extends('app')

@section('content')
    <div class="max-w-xl m-auto py-2 mt-4 border-2 rounded-lg">
        <div>{{$todos}}</div>
        <form class="p-3 mb-5" action="{{ route ('todos.update',['id' => $todos -> id]) }}" method="post">
            @csrf
            @method('patch')
            @if(session ('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 mb-3" role="alert">
                    {{ session ('success') }}
                </div>
            @endif
            @error('title')
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3" role="alert">
                {{ $message }}
            </div>
            @enderror

            <div class="mb-4">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Titulo de la tarea</label>
                <input type="text" id="tarea" name="title" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nombre tarea" required="" value="{{$todos->title}}">
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-1.5 text-center">Crear nueva tarea</button>
        </form>
    </div>
@endsection
