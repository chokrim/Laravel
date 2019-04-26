@extends('layouts.app')

@section('content')
    <h1>Edit post</h1>
   {{-- avec ca ci-dessous on a le tag form et la sécurité du formulaire --}}
    {{ Form::open(['action' => ['PostController@update',$post->id], 'method' =>'POST']) }} {{-- c la page ou il va l'envoyer --}}
        <div class="forn-group">
            {{Form::label('title','Tiltle')}}
            {{-- label for=tiltle>Title</label --}}
            {!!Form::text('title',$post->title,['class' => 'form-control','placeholder' => 'Tiltle'])!!}
            {{-- input type="text" name="title" value="" class="form-control" --}}
        </div>
        <div>
            {{Form::label('body','Body')}}
            {!!Form::textarea('body',$post->body,['class' => 'form-control','placeholder' => 'Enter your text'])!!}
        </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
       
    {{ Form::close() }}
@endsection