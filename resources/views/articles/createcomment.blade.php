@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Ajouter comment
                    <a href="{{ route('articles.details') }}" class="btn btn-secondary btn-sm float-end">Retour</a>
                </div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('articles.createcomment') }}" method="POST">
                        @csrf
                    
                        <div class="mb-3">
                            <label for="contenu" class="form-label">Contenu</label>
                            <textarea class="form-control" id="contenu" name="contenu" rows="5" required>{{ old('contenu') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection