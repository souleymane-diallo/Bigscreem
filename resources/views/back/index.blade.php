<x-app-layout>

  <div class="grid grid-cols-1 lg:grid-cols-2 p-4 gap-4">
    @foreach ($pieDatas as $pieData)
    <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
        <div class="rounded-t mb-0 px-0 border-0">
          <div class="flex flex-wrap items-center px-4 py-2">
            <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">{{ $pieData['question'] }}</h3>
          </div>

          <div class="block w-full overflow-x-auto">
            <canvas class="p-2" id="question{{ $pieData['question_id'] }}" height="200"></canvas>
          </div>
        </div>
      </div>
    @endforeach
    <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
      <div class="rounded-t mb-0 px-0 border-0">
        <div class="flex flex-wrap items-center px-4 py-2">
          <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">{{ $pieData['question'] }}</h3>
        </div>

        <div class="block w-full overflow-x-auto">
          <canvas class="p-2" id="questionRadar" height="200"></canvas>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    @foreach ($pieDatas as $pieData)
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
    @endforeach

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

</x-app-layout>
