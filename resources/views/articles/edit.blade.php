@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex justify-center">
        <div class="w-full md:w-2/3 lg:w-1/2">
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="flex justify-between items-center px-6 py-4 bg-gray-50 border-b">
                    <h2 class="text-lg font-medium text-gray-900">Modifier l'article</h2>
                    <a href="{{ route('articles.index') }}" class="inline-flex items-center px-3 py-1 bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium rounded-md transition">Retour</a>
                </div>

                <div class="px-6 py-4">
                    @if($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                            <ul class="list-disc pl-5 text-red-700">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('articles.update', $article->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-6">
                            <label for="titre" class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                            <input 
                                type="text" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                id="titre" 
                                name="titre" 
                                value="{{ old('titre', $article->titre) }}" 
                                required
                            >
                        </div>
                        
                        <div class="mb-6">
                            <label for="contenu" class="block text-sm font-medium text-gray-700 mb-1">Contenu</label>
                            <textarea 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                id="contenu" 
                                name="contenu" 
                                rows="5" 
                                required
                            >{{ old('contenu', $article->contenu) }}</textarea>
                        </div>
                        
                        <div>
                            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection