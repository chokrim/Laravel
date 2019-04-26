@extends('layouts.app')

@section('content')
    <h1>Create post</h1>
   {{-- avec ca ci-dessous on a le tag form et la sécurité du formulaire --}}
    {{ Form::open(['action' => 'PostController@store', 'method' =>'POST']) }} {{-- c la page ou il va l'envoyer --}}
        <div class="forn-group">
            {{Form::label('title','Tiltle')}}
            {{-- label for=tiltle>Title</label --}}
            {{Form::text('title','',['class' => 'form-control','placeholder' => 'Tiltle'])}}
            {{-- input type="text" name="title" value="" class="form-control" --}}

            {{Form::label('body','Body')}}
            {{Form::textarea('body','',['class' => 'form-control','placeholder' => 'Enter your text'])}}
            
            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
        </div>
    {{ Form::close() }}
@endsection