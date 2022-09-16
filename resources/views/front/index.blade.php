<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-5">
                        <h1 class="fon-semibold text-2xl">Merci de repondre à toutes les questions et de valider le formulaire en bas de page.</h3>
                    </div>

                    <form action="{{ route('answer.store') }}" method="POST">
                        @csrf
                            @forelse ($questions as $question)
                            <div class="bg-gray-400 p-2 my-2 rounded-md shadow-sm">
                                <h3 class="font-semibold text-white">{{ $question->title }}</h3>
                                <p class="text-white"> {{ $question->body }} </p>
                                <div class="border-dashed border-2 border-sky-500 p-2 my-2">
                                    @if ($question->type === 'B')
                                         @if( $question->check_email )
                                            <x-text-input
                                                name="email[{{ $question->id }}]"
                                                id="email"
                                                class="block mt-1 w-full"
                                                type="email"
                                                 required
                                            />
                                        @else
                                            <x-text-input
                                                name="answer{{ $question->type }}[{{ $question->id }}]"
                                                id="answer{{ $question->id }}"
                                                class="block mt-1 w-full"
                                                type="text"
                                                 required
                                             />
                                        @endif

                                    @else
                                        <select
                                        name="answer{{ $question->type }}[{{ $question->id }}]"
                                        id="answer{{$question->id}}"
                                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        >
                                            <option>--- Selectionnez votre réponse ----</option>
                                            @foreach (explode(',', $question->possible_answer) as $answer)
                                                <option value="{{ $answer }}">{{ $answer }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>

                            @empty
                                <p>Aucune questions...</p>
                            @endforelse

                        <div class="flex items-center justify-end mt-2">
                            <x-primary-button class="ml-3">
                                {{ __('Finaliser') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

