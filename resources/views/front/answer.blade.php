<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="mb-2">
                    <img src="{{ asset('image/bigscreen_logo.png') }}" alt="logo BigScreen" width=250 />
                </div>
                    @foreach ($questions as $question)
                    <h1 class="fon-semibold text-1xl mb-4">Votre trouverez ci-dessous les réponses que avez apportés à
                    notre sondage le {{ $question->created_at}}</h1>
                        <div class="bg-gray-400 p-2 my-2 rounded-md shadow-sm">
                            <h3 class="font-semibold text-white">{{ $question->title }}</h3>
                            <p class="text-white"> {{ $question->body }} </p>
                            @foreach ($answers as $key => $value)
                                @if ($question->id == $key)
                                    <div class="border-dashed border-2 border-sky-500 p-2 my-2">
                                        <p>{{ $value }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
