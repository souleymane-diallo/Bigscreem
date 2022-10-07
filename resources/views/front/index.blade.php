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
                    <form action="{{ route('answer.store') }}" method="POST">
                        @csrf
                        @forelse ($questions as $question)

                            <div class="bg-gray-200 p-2 my-2 rounded-md shadow-sm">
                                <h3 class="font-semibold">{{ $question->title }}</h3>
                                <div class="border-dashed border-2 border-gray-800 p-2 my-2">
                                    @if ($question->type === 'B')
                                        @if ($question->check_email)
                                            <span class="text-red-700"">{{ $mail }}</span>
                                            <label for="answer-{{ $question->id }}">{{ $question->body }}</label>
                                            <x-text-input name="answer{{ $question->id }}"
                                                id="answer-{{ $question->id }}"
                                                :value="old('answer1')" class="block mt-1 w-full" type="email" />
                                                @error("answer".($question->id))
                                                    <span class="text-red-700" >{{ $message }}</span>
                                                @enderror
                                        @else
                                            <label for="answer-{{ $question->id }}">{{ $question->body }}</label>
                                            <x-text-input name="answer{{ $question->id }}"
                                                id="answer-{{ $question->id }}" class="block mt-1 w-full" type="text"
                                                :value="old('answer'.($question->id))"/>
                                            @error("answer".($question->id))
                                                <span class="text-red-700" >{{ $message }}</span>
                                            @enderror
                                        @endif
                                    @else
                                        <div class="mb-5">
                                            <div class="flex items-center space-x-6">
                                                <?php $i=1 ?>
                                                @foreach (explode(',', $question->possible_answer) as $answer)


                                                    <div class="flex items-center">
                                                        <input type="radio" name="answer{{ $question->id }}" value="{{ $i }}" {{(old('answer'.($question->id)) ==  $i ) ? 'checked' : " " }}

                                                            id="answer{{ $question->id }}-{{ $i }}" class="h-5 w-5" />
                                                        <label for="answer{{ $question->id }}-{{ $i }}"
                                                            class="pl-3 text-base font-medium text-[#07074D]">
                                                           {{ $answer }}
                                                        </label>
                                                    </div>
                                                    <?php $i++ ?>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                        @error("answer".($question->id))
                                                <span class="text-red-700" >{{ $message }}</span>
                                        @enderror
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
