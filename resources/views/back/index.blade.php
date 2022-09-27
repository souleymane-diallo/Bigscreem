<x-app-layout>

  <div class="grid grid-cols-1 lg:grid-cols-2 p-4 gap-4">

    <!-- Social Traffic -->
    <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
      <div class="rounded-t mb-0 px-0 border-0">
        <div class="flex flex-wrap items-center px-4 py-2">
          <div class="relative w-full max-w-full flex-grow flex-1">
            <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">PIE CHART</h3>
          </div>
        </div>
        <div class="block w-full overflow-x-auto">
          <canvas id="myChart"></canvas>
        </div>
      </div>
    </div>

    <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
      <div class="rounded-t mb-0 px-0 border-0">
        <div class="flex flex-wrap items-center px-4 py-2">
          <div class="relative w-full max-w-full flex-grow flex-1">
            <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Radar Char</h3>
          </div>
        </div>
        <div class="block w-full overflow-x-auto">
          <div>
            <canvas id="myChart2"></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- ./Social Traffic -->
    <script type="text/javascript">
      const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
      ];

      const data = {
        labels: labels,
        datasets: [{
          label: 'My First dataset',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: [0, 10, 5, 2, 20, 30, 45],
        }]
      };

      const config = {
        type: 'line',
        data: data,
        options: {}
      };

      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );

    </script>
  </div>

</x-app-layout>
