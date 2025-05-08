@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex justify-center">
        <div class="w-full md:w-2/3 lg:w-1/2">
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="flex justify-between items-center px-6 py-4 bg-gray-50 border-b">
                    <h2 class="text-lg font-medium text-gray-900">Article</h2>
                    <a href="{{ route('articles.index') }}" class="inline-flex items-center px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md transition">Retour</a>
                </div>

                <div class="px-6 py-4">
                    @if(session('success'))
                        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $article->titre }}</h3>
                        <p class="text-gray-700 mb-4">{{ $article->contenu }}</p>
                        <a href="{{ route('articles.createcomment', $article->id) }}" class="inline-flex items-center px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded-md transition">
                            Ajouter commentaire
                        </a>
                    </div>

                    <div class="border-t pt-4">
                        <h4 class="text-lg font-medium text-gray-900 mb-3">Commentaires</h4>
                        
                        @if(isset($comments) && $comments->count() > 0)
                            <div class="space-y-3 mt-4">
                                @foreach($comments as $comment)
                                    <div class="border rounded-lg p-4 bg-gray-50">
                                        <div class="flex justify-between items-center mb-2">
                                            <span class="text-sm text-gray-500">Commentaire #{{ $comment->id ?? 'N/A' }}</span>
                                        </div>
                                        <p class="text-gray-700">{{ $comment->contenu }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 mt-3">Aucun commentaire pour cet article.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection