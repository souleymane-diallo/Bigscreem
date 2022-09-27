<x-app-layout>
<!-- component -->
  <!-- ./Statistics Cards -->
  <div class="grid grid-cols-1 lg:grid-cols-2 p-4 gap-4">

    <!-- Social Traffic -->
    <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
      <div class="rounded-t mb-0 px-0 border-0">
        <div class="flex flex-wrap items-center px-4 py-2">
          <div class="relative w-full max-w-full flex-grow flex-1">
            <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Social Traffic</h3>
          </div>
          <div class="relative w-full max-w-full flex-grow flex-1 text-right">
            <button class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">See all</button>
          </div>
        </div>
            <div class="row">
                @forelse($pieDatas as $pieData)
                    <div class="col-md-6 mt-6">
                        <p class="question">{{ $pieData['question'] }}</p>
                        <canvas id="question{{ $pieData['question_id'] }}" height="360"></canvas>
                    </div>
                @empty
                @endforelse

                <div class="col-md-6 mt-6">
                    <p class="question"></p>
                    <canvas id="questionRadar" height="360"></canvas>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

            @forelse($pieDatas as $pieData)
                <script>
                    var ctx = document.getElementById("question" + <?= $pieData['question_id'] ?>).getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: @json($pieData['labels']),
                            datasets: [{
                                data: @json($pieData['datas']),
                                backgroundColor: @json($pieData['colors'])
                            }]
                        }
                    });
                </script>
            @empty
            @endforelse
      </div>
    </div>

    <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
      <div class="rounded-t mb-0 px-0 border-0">
        <div class="flex flex-wrap items-center px-4 py-2">
          <div class="relative w-full max-w-full flex-grow flex-1">
            <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Social Traffic</h3>
          </div>
          <div class="relative w-full max-w-full flex-grow flex-1 text-right">
            <button class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">See all</button>
          </div>
        </div>
        <script>
                    var ctx = document.getElementById("questionRadar").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'radar',
                        data: {
                            /**
                             * labels = ID de la Question
                             * data = Moyenne obtenue par la question
                             */
                            labels: @json($radarDatas['labels']),
                            datasets: [{
                                label: "Moyenne",
                                data: @json($radarDatas['datas']),
                                backgroundColor: "rgba(179,181,198,0.2)",
                                borderColor: "rgba(179,181,198,1)",
                                pointBackgroundColor: "rgba(179,181,198,1)",
                                pointBorderColor: "#fff",
                                pointHoverBackgroundColor: "#fff",
                                pointHoverBorderColor: "rgba(179,181,198,1)",
                            }]
                        },
                        options: {
                            scale: {
                                ticks: {
                                    beginAtZero: true,
                                    max: 5,
                                    stepSize: 1
                                }
                            }
                        }
                    });
                </script>
      </div>
    </div>

  </div>

</x-app-layout>
