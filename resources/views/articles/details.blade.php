@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Article
                    <a href="{{ route('articles.index') }}" class="btn btn-primary btn-sm float-end">Retour</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titre</th>
                                    <th> Contenu </th>
                                    <th>Action </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               
                                    <tr>
                                        <td>{{ $article->id }}</td>
                                        <td>{{ $article->titre }}</td>
                                        <td>{{$article->contenu}} </td>
                                        <td> <a href="{{ route('articles.createcomment', $article->id) }}" class="btn btn-sm btn-info">Ajouter commentaire</a></td>
                                    </tr>
                                    @if(count($comments) > 0)  
                                    

                                    @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->contenu }}</td>
                                        
                                    </tr>
                                @endforeach
                                    
                                    @endif
                             
                            </tbody>
                        </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection