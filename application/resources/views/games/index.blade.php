<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Game Information</title>

    <!-- Fonts and Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body class="overflow-hidden font-sans antialiased dark:bg-white dark:text-white/50">
    <div class="flex items-center md:w-[83.33%] h-24 overflow-hidden font-sans text-3xl font-semibold text-right text-black bg-gray-300 size-fullflex sm:float-end 2xl:float-end md:float-end xl:float-end">
        <h1 class="relative xl:mx-auto xl:text-center xl:left-11 xl:right-11">Game Information Management System</h1>
    </div>
    @foreach ($games as $game)
    <main class="relative h-screen md:h-[30%] xl:h-[30%] lg:h-80 sm:h-96 2xl:h-[100%] bg-slate-500 amo text-black left-[400px] top-96  float-end">
        <h1 class="absolute text-[50px] right-[20px] bottom-[200px] 2xl:left-[30px] xl:left-[-300px]">Announcements:</h1>
        <div class="relative">
            <div class="absolute grid self-center left-[-300px] grid-cols-3 justify-center grid-rows-3 gap-4 h-[1050px] text-center w-[1400px] bg-slate-500">
                <div class="h-20 bg-white">{{$game->games}}</div>
                <div class="h-20 bg-white">{{$game->date_played}}</div>
                <div class="h-20 bg-white">fs</div>
                <div class="h-20 bg-white">hi</div>
                <div class="h-20 bg-white"><h1>Player Ranks: {{$game->team_standing}}</h1></div>
                <div class="h-20 bg-white"><a href="{{route('game.edit', ['id'=>$game])}}">Edit</a></div>
            </div>
        </div>
    </main>
    @endforeach


    <!-- Side Content -->
    <div class="relative text-2xl text-white sm:text-center xl:text-center lg:text-center bg-zinc-800 h-dvh w-80 col-1">
        <div class="relative rounded-full bg-zinc-500 md:h-80 md:w-200px top-2">

            <img src="" class="relative object-cover w-full h-full rounded-full" alt="Logo">








        </div>
        <p class="relative top-2">University of Perpetual Help System Dalta - Molino Campus</p>
        <div class="relative">
            <div class="relative flex items-center rounded-tl-full rounded-tr-full rounded-bl-full rounded-br-full cursor-pointer justify-self-auto top-6 hover:bg-sky-700 w-50">
                <i class="relative fas fa-tachometer-alt left-20"></i>
                <a href="#" class="relative left-24">Dashboard</a>
            </div>
            <div class="relative flex items-center h-auto gap-1 mt-4 rounded-tl-full rounded-tr-full rounded-bl-full rounded-br-full cursor-pointer justify-self-auto top-6 row col-1 hover:bg-sky-700 w-50">
                <i class="relative fas fa-basketball-ball left-20"></i>
                <a href="#" class="relative left-24">Games</a>
            </div>
            <div class="relative flex items-center h-auto gap-1 mt-4 rounded-tl-full rounded-tr-full rounded-bl-full rounded-br-full cursor-pointer justify-self-auto top-6 row col-1 hover:bg-sky-700 w-50">
                <i class="relative fas fa-users left-20"></i>
                <a href="#" class="relative left-24">Users</a>
            </div>
            <div class="relative flex items-center h-auto gap-1 mt-4 rounded-tl-full rounded-tr-full rounded-bl-full rounded-br-full cursor-pointer justify-self-auto top-6 row col-1 hover:bg-sky-700 w-50">
                <i class="relative fas fa-trophy left-20"></i>
                <a href="{{route('game.create')}}" class="relative left-24">Team Rankings</a>
            </div>
            <div class="relative flex items-center h-auto gap-1 mt-4 rounded-tl-full rounded-tr-full rounded-bl-full rounded-br-full cursor-pointer justify-self-auto top-6 row col-1 hover:bg-sky-700 w-50">
                <i class="relative fas fa-cog left-20"></i>
                <a href="#" class="relative left-24">Settings</a>
            </div>
            <div class="relative flex items-center h-auto gap-1 mt-4 rounded-tl-full rounded-tr-full rounded-bl-full rounded-br-full cursor-pointer justify-self-auto top-6 row col-1 hover:bg-sky-700 w-50">
                <i class="relative fas fa-sign-out left-20"></i>
                <a href="#" class="relative left-24">Sign out</a>
            </div>
        </div>
    </div>
</body>
</html>
