<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Game Information</title>

    <!-- Fonts and Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="overflow-hidden font-sans antialiased dark:bg-white dark:text-white/50" onLoad="noBack();">
    <div class="flex items-center md:w-[83.33%] h-24 overflow-hidden font-sans text-3xl font-semibold text-right text-black bg-gray-300 size-fullflex sm:float-end 2xl:float-end md:float-end xl:float-end">
        <h1 class="relative xl:mx-auto xl:text-center xl:left-11 xl:right-11">Game Information Management System</h1>
    </div>

    <main class="relative h-screen md:h-[30%] xl:h-[30%] rounded-full lg:h-80 sm:h-96 2xl:h-[100%] bg-slate-500 text-black left-[299px] top-[200px]  float-end">
        <h1 class="absolute text-[50px] right-[200px] bottom-[20px] 2xl:left-[-291px] xl:left-[-300px]">Games:</h1>
        <div class="relative">
            <div class="absolute overflow-hidden grid self-center left-[-300px] grid-cols-1 items-center justify-center grid-rows-3 rounded-tl-lg gap-4 h-[1050px] text-center w-[1600px] bg-slate-500">
                <div class="mb-16 overflow-hidden bg-slate-700">
                    <table class="absolute table table-dark table-hover top-[20px]  overflow-auto">
                        <thead>
                        <tr>
                            <th>Standing</th>
                            <th>ID</th>
                            <th>Team Name</th>
                            <th>Wins</th>
                            <th>Losses</th>
                            <th>Game 1</th>
                            <th>Game 2</th>
                            <th>Game 3</th>
                            <th>Total Scores</th>
                            <th>Total Wins</th>
                            <th>Total Losses</th>
                            <th>fpg</th>
                            <th>Date Played</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                            $index = 1;
                            @endphp
                            @foreach ($games as $game)
                        <tr>
                            <td>Rank {{$index++}}</td>
                            <td>{{$game->id}}</td>
                            <td>{{$game->teamname}}</td>
                            <td>{{$game->wins}}</td>
                            <td>{{$game->losses}}</td>
                            <td>{{$game->game1}}</td>
                            <td>{{$game->game2}}</td>
                            <td>{{$game->game3}}</td>
                            <td>{{$game->final_score}}</td>
                            <td>{{$game->total_wins}}</td>
                            <td>{{$game->total_losses}}</td>
                            <td>{{$game->fpg}}%</td>
                            <td>{{$game->date_played}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </main>





    <!-- Side Content -->
    <div class="relative overflow-hidden text-2xl text-white sm:text-center xl:text-center lg:text-center bg-zinc-800 h-dvh w-80 col-1">
        <div class="relative rounded-full bg-zinc-500 md:h-80 md:w-200px top-2">
            <img src="https://scontent.fcrk4-2.fna.fbcdn.net/v/t1.15752-9/361839816_594450056207554_5067445039035230165_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeH7aVd9xyUPlxsDrw1HGupokKj6k4-Hb5-QqPqTj4dvn469EAukG5ZNsWA_cyMs37BNKmn5QYbzvKCBQ6xFxPf4&_nc_ohc=84g4L3woZVQQ7kNvgFXN0RZ&_nc_ht=scontent.fcrk4-2.fna&oh=03_Q7cD1QFSljQWGhWTfu5mpa4p0iI8TNz8y-Th9RLoJQYlV7_W8w&oe=667D3269" class="relative object-cover w-full h-full rounded-full" alt="Logo">
        </div>
        <p class="relative top-2">University of Perpetual Help System Dalta - Molino Campus</p>
        <div class="relative">
            <a href="{{route('seeGuest')}}" class="relative flex items-center w-auto rounded-full cursor-pointer top-6 hover:bg-sky-700">
                <i class="relative fas fa-tachometer-alt left-5"></i>
                <span class="relative left-7">Dashboard</span>
            </a>
            <a href="{{route('game1.index')}}" class="relative flex items-center w-auto gap-1 mt-4 rounded-full cursor-pointer top-6 hover:bg-sky-700 active:bg-sky-700 bg-sky-700">
                <i class="relative fas fa-basketball-ball left-5"></i>
                <span class="relative left-7">Games</span>
            </a>
            <a href="{{route('game.create')}}" class="relative flex items-center w-auto gap-1 mt-4 rounded-full cursor-pointer top-6 hover:bg-sky-700">
                <i class="relative fas fa-trophy left-5"></i>
                <span class="relative left-7">Players</span>
            </a>
            <form action="{{route('logout')}}" method="post">
                @csrf
                @method('post')
            <button type="submit" class="relative flex items-center w-full gap-1 mt-4 rounded-full cursor-pointer top-6 hover:bg-sky-700 lg:relative lg:flex">
                <i class="relative fas fa-sign-out left-5"></i>
                <span class="relative left-7">Back</span>
            </button>
            </form>
        </div>
    </div>

</body>
</html>
