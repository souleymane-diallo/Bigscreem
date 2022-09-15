@extends('layouts.master')
@section('barmenu')
    @include('partials.menu')
@endsection

@section('content')

<form action="" method="POST">
    {{ csrf_field() }}
    <div class="container" style="min-width:300px;margin:auto">
        <center>

            <div class="row mt-4">
                @foreach($questions as $question)
                <div class="col-md-12 mb-4">
                    <h1>{{ $question->question }}</h1>
                    @foreach($answers as $key => $value)
                    @if($question->id == $key)
                    <div class="col-md-12">
                        <p>{{ $value }}</p>
                    </div>
                    @endif
                    @empty
                    <p>Aucune réponses...</p>

                    @endforeach
                </div>
                @empty
                <p>Aucune réponses...</p>

                @endforeach
            </div>
        </center>
    </div>

</form>

@endsection

