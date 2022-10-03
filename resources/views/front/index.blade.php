<x-app-layout>
    <div class="">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-md">
                <div class="p-4 bg-gray-600 border-b border-gray-200">
                    <div class="mb-2">
                        <img src="{{ asset('image/bigscreen_logo.png') }}" alt="logo BigScreen" width=250 />
                    </div>
                    <div class="mb-5">
                        <h1 class="fon-semibold text-1xl text-white">Merci de repondre à toutes les questions et de
                            valider le formulaire en bas de page.</h3>
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
                                        @if ($question->check_email)
                                            <span style="color:red">{{ $mail }}</span>
                                            <x-text-input name="email[{{ $question->id }}]" id="email"
                                                :value="old('email[{{ $question->id }}]')" class="block mt-1 w-full" type="email" />
                                            @error('email[{{ $question->id }}]')
                                                <span class="text-danger"></span>
                                            @enderror
                                            <span class="text-danger">test1</span>
                                        @else
                                            <x-text-input name="answer{{ $question->type }}[{{ $question->id }}]"
                                                id="answer{{ $question->id }}" class="block mt-1 w-full" type="text"
                                                :value="old('answer{{ $question->type }}[{{ $question->id }}]')" r />
                                            @error('answer{{ $question->type }}[{{ $question->id }}]')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <span class="text-danger">test2</span>
                                        @endif
                                    @else
                                        <div class="mb-5">
                                            <div class="flex items-center space-x-6">
                                                @foreach (explode(',', $question->possible_answer) as $answer)
                                                <div class="flex items-center">
                                                    <input type="radio" name="answer{{ $question->type }}[{{ $question->id }}]" id="radioButton1"
                                                        class="h-5 w-5"  value="{{ $answer }}"/>
                                                    <label for="radioButton1"
                                                        class="pl-3 text-base font-medium text-[#07074D]">
                                                        {{ $answer }}
                                                    </label>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>

                                        {{-- <select name="answer{{ $question->type }}[{{ $question->id }}]"
                                            id="answer{{ $question->id }}"
                                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <option value="">--- Selectionnez votre réponse ----</option>
                                            @foreach (explode(',', $question->possible_answer) as $answer)
                                                <option @selected(old('possible_answer')) value="{{ $answer }}">
                                                    {{ $answer }}
                                                </option>
                                            @endforeach

                                        </select>
                                        @error('answer{{ $question->type }}[{{ $question->id }}]')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror --}}

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
