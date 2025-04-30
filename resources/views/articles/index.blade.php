@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Liste des articles
                    <a href="{{ route('articles.create') }}" class="btn btn-primary btn-sm float-end">Ajouter un article</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(count($articles) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titre</th>
                                    <th> Contenu </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>{{ $article->id }}</td>
                                        <td>{{ $article->titre }}</td>
                                        <td><a href="{{ route('articles.details', $article->id) }}" class="btn btn-sm btn-info">Details</a></td>
                                        <td>
                                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-info">Modifier</a>
                                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Aucun article disponible.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection