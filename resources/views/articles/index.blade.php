@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex justify-center">
        <div class="w-full md:w-2/3 lg:w-3/4">
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="flex justify-between items-center px-6 py-4 bg-gray-50 border-b">
                    <h2 class="text-lg font-medium text-gray-900">Liste des articles</h2>
                    <a href="{{ route('articles.create') }}" class="inline-flex items-center px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md transition">Ajouter un article</a>
                </div>

                <div class="px-6 py-4">
                    @if(session('success'))
                        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(count($articles) > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contenu</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($articles as $article)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $article->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $article->titre }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <a href="{{ route('articles.details', $article->id) }}" class="inline-flex items-center px-2.5 py-1 bg-blue-100 hover:bg-blue-200 text-blue-800 text-xs font-medium rounded-md transition">Details</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2 flex">
                                                <a href="{{ route('articles.edit', $article->id) }}" class="inline-flex items-center px-2.5 py-1 bg-indigo-100 hover:bg-indigo-200 text-indigo-800 text-xs font-medium rounded-md transition">Modifier</a>
                                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button 
                                                        type="submit" 
                                                        class="inline-flex items-center px-2.5 py-1 bg-red-100 hover:bg-red-200 text-red-800 text-xs font-medium rounded-md transition"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article?')"
                                                    >
                                                        Supprimer
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500">Aucun article disponible.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection