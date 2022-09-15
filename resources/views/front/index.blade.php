@extends('layouts.master')
@section('barmenu')
    @include('partials.menu')
@endsection

@section('content')

<form action="" method="POST">
    {{ csrf_field() }}
    <div class="container" style="min-width:300px;margin:auto">
        <center>
            @foreach($questions as $question)
        <div class="form-group">
            <p class="question-sentence">{{ $question->title }}</p>
            <p class="question-sentence">{{ $question->body }}</p>
            <div>
                @if( $question->type === "B" )
                    @if( $question->check_email )
                    <input type="email" name="email[{{ $question->id }}]" id="email" class="form-control">
                    @else
                    <input type="text" name="answer{{ $question->type }}[{{ $question->id }}]" id="answer{{ $question->id }}" class="form-control">
                    @endif
                @else
                    <select name="answer{{ $question->type }}[{{ $question->id }}]" id="answer{{$question->id}}" class="form-control">

                        @foreach(explode(', ', $question->possible_answer) as $answer)
                        <option value="{{ $answer }}">{{ $answer }}</option>

                        @endforeach
                    </select>
                @endif
            </div>
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Finaliser</button>
        </center>
    </div>
</form>
@endsection

