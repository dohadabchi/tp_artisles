@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex justify-center">
        <div class="w-full md:w-2/3 lg:w-1/2">
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="flex justify-between items-center px-6 py-4 bg-gray-50 border-b">
                    <h2 class="text-lg font-medium text-gray-900">Ajouter un commentaire</h2>
                    <a href="{{ route('articles.details', $article->id) }}" class="inline-flex items-center px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md transition">Retour</a>
                </div>

                <div class="px-6 py-4">
                    @if($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                            <ul class="list-disc pl-5 text-red-700 mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h3 class="text-lg font-medium text-gray-900 mb-4">Article: {{ $article->titre }}</h3>

                    <form action="{{ route('articles.storecomment', $article->id) }}" method="POST">
                        @csrf
                        
                        <div class="mb-6">
                            <label for="contenu" class="block text-sm font-medium text-gray-700 mb-1">Votre commentaire</label>
                            <textarea 
                                name="contenu" 
                                id="contenu" 
                                rows="5" 
                                class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('contenu') border-red-500 @else border-gray-300 @enderror" 
                                required
                            >{{ old('contenu') }}</textarea>
                            @error('contenu')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition">Publier le commentaire</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection