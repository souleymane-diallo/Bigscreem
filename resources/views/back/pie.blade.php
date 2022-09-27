<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Big Screen</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 admin-panel">
                <img src="{{ asset('image/bigscreen_logo.png') }}" alt="logo BigScreen" width=300>
                <ul>
                    <li><a href="">Accueil</a></li>
                    <li><a href="">Questionnaire</a></li>
                    <li><a href="">Réponses</a></li>
                </ul>

                <a class="dropdown-item" href=""
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                </a>

                <form id="logout-form" action="" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <div class="col-md-8">
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

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
