<x-app-layout>
    <!-- Client Table Reponses -->
    <div class="mt-20 mx-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">

                <table class="w-full">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">N°</th>
                            <th class="px-4 py-3">Corps de Questions</th>
                            <th class="px-4 py-3">Réponses</th>
                        </tr>
                    </thead>
                    @forelse($answers as $answer)
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @forelse($questions as $question)
                                <tr
                                    class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div>
                                                <p class="font-semibold">{{ $question->id }}</p>

                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-sm"> {{ $question->body }}</td>

                                    <td class="px-4 py-3 text-xs">
                                        @forelse($answer as $key => $value)
                                            @if ($question->id == $key)
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    {{ $value }}</span>
                                            @endif
                                        @empty
                                        @endforelse
                                    </td>
                                </tr>
                            @empty
                                <tr>Aucune réponse...</tr>
                            @endforelse
                        </tbody>
                    @empty
                        <p>Non...</p>
                    @endforelse
                </table>

            </div>
        </div>
    </div>


    <!-- ./Client Table -->
</x-app-layout>
