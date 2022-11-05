@php use Carbon\CarbonInterval; @endphp
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tasks List</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>


</head>
<body>
<h4 class="text-center">weekly task schedule</h4>
<div class="container-fluid">
    <div class="">
        <div class="row">
            @foreach($developers as $developer)
                <div class="col border">
                    <div class="text-center">
                        {{ $developer->name }}
                    </div>

                    <div class="d-flex col-md-12">
                        <div class="p-2 col-md-2">
                            Task Name
                        </div>
                        <div class="p-2 col-md-2">
                            Level
                        </div>
                        <div class="p-2 col-md-3">
                            Estimated
                        </div>
                        <div class="p-2 col-md-3">
                            Spent time
                        </div>
                        <div class="p-2 col-md-2">
                            Total
                        </div>
                    </div>
                    @php $totalHour = 0; @endphp
                    @foreach($developer->tasks as $task)
                        <div class="d-flex  col-md-12">
                            <div class="p-2 col-md-2">
                                {{ $task->name }}
                            </div>
                            <div class="p-2 text-center col-md-2">
                                {{ $task->level }}
                            </div>
                            <div class="p-2 text-center col-md-3">
                                {{ $task->estimated_duration }}
                            </div>
                            <div class="p-2 text-center col-md-3">
                                {{ gmdate('H:i', floor($task->expected_duration * 3600)) }}
                            </div>
                            <div class="p-2 text-end col-md-2">
                                @php $totalHour += $task->expected_duration @endphp
                                {{ CarbonInterval::seconds($totalHour * 3600)->cascade()->forHumans(['short' => true]) }}
                            </div>
                        </div>
                    @endforeach
                    <div class="text-right items-center">
                        Total: {{ number_format(round($totalHour) / 45, 2) . ' week' }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
