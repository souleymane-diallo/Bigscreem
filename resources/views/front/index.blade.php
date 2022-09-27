<x-app-layout>
    <div class="">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-md">
                <div class="p-4 bg-gray-600 border-b border-gray-200">
                    <div class="mb-2">
                        <img src="{{ asset('image/bigscreen_logo.png') }}" alt="logo BigScreen" width=250 />
                    </div>

                    <div class="mb-5">
                        <h1 class="fon-semibold text-1xl text-white">Merci de repondre à toutes les questions et de valider le formulaire en bas de page.</h3>
                    </div>
                    <!-- Erreurs de validation -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form action="{{ route('answer.store') }}" method="POST">
                        @csrf
                            @forelse ($questions as $question)
                            <div class="bg-gray-200 p-2 my-2 rounded-md shadow-sm">
                                <h3 class="font-semibold">{{ $question->title }}</h3>
                                <p> {{ $question->body }} </p>
                                <div class="border-dashed border-2 border-gray-800 p-2 my-2">
                                    @if ($question->type === 'B')
                                         @if( $question->check_email )
                                            <x-text-input
                                                name="email[{{ $question->id }}]"
                                                id="email"
                                                :value="old('email[{{ $question->id }}]')"
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
                                                :value="old('answer{{ $question->type }}[{{ $question->id }}]')"
                                                required
                                             />
                                        @endif

                                    @else
                                        <select
                                        name="answer{{ $question->type }}[{{ $question->id }}]"
                                        id="answer{{$question->id}}"
                                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        >
                                            <option value="">--- Selectionnez votre réponse ----</option>
                                            @foreach (explode(',', $question->possible_answer) as $answer)
                                                <option
                                                    @selected(old('possible_answer'))
                                                    value="{{ $answer }}"
                                                >
                                                    {{ $answer }}
                                                </option>
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

