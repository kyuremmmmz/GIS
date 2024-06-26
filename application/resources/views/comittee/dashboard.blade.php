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
<body class="overflow-hidden font-sans antialiased dark:bg-white dark:text-white/50" onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
    <div class="flex items-center md:w-[83.33%] h-24 overflow-hidden font-sans text-3xl font-semibold text-right text-black bg-gray-300 size-fullflex sm:float-end 2xl:float-end md:float-end xl:float-end">
        <h1 class="relative xl:mx-auto xl:text-center xl:left-11 xl:right-11">Game Information Management System</h1>
        <div class="absolute dropdown right-16">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
              {{Auth::guard('committees')->user()->name}}
            </button>
            <ul class="dropdown-menu">

              <li>
                <form action="{{ route('ComitteeSettings', ['comitteeID' => Auth::guard('committees')->id()]) }}" method="POST">
                    @csrf
                    @method('get')
                    <button class="dropdown-item">Account</button>
                </form>
              </li>
            </ul>
          </div>

    </div>

    <main class="relative h-screen md:h-[30%] xl:h-[30%] rounded-full lg:h-80 sm:h-96 2xl:h-[100%] bg-slate-500 text-black left-[299px] top-[200px] float-end">
        <h1 class="absolute text-[50px] right-[200px] bottom-[20px] 2xl:left-[-291px] xl:left-[-300px]">Announcements:</h1>
        <div class="relative">
            <div class="absolute grid self-center left-[-300px] grid-cols-3 items-center justify-center grid-rows-4 rounded-tl-lg gap-4 h-[1050px] w-[1600px] bg-slate-500">

                <div class="h-[200px] overflow-y-scroll bg-slate-700 text-[30px] rounded-2xl">
                    <h1 class="absolute mt-1 text-white ml-[4px] text-[20px] rounded-2xl font-bold">Top 5 Players</h1>
                    @php
                    $index = 1;
                    @endphp

                    @foreach ($count as $Count)
                    <p class="relative mt-2 top-9 text-[19px] ml-[6px] text-white rounded-2xl ">
                        {{$index++}}. {{$Count->name}}
                    </p>
                    @endforeach
                </div>
                <div class="h-[200px] overflow-y-scroll bg-slate-700 text-[30px] rounded-2xl">
                    <h1 class="absolute mt-1 text-white ml-[4px] text-[20px] rounded-2xl font-bold">Top 3 Teams</h1>
                    @php
                    $index = 1;
                    @endphp

                    @foreach ($gamesCount as $gamesCount)
                    <p class="relative mt-2 top-9 text-[19px] ml-[6px] text-white rounded-2xl ">
                        {{$index++}}. {{$gamesCount->teamname}}
                    </p>
                    @endforeach
                </div>
                <div class="h-[200px] overflow-y-scroll bg-slate-700 text-[30px] rounded-2xl">
                    <h1 class="absolute mt-1 text-white ml-[4px] text-[20px] rounded-2xl font-bold">Admins:</h1>
                    @php
                    $index = 1;
                    @endphp

                    @foreach ($data as $gamesCount)
                    <p class="relative mt-2 top-9 text-[19px] ml-[6px] text-white rounded-2xl ">
                        {{$index++}}. {{$gamesCount->Adminname}}
                    </p>
                    @endforeach
                </div>
                <div class="h-[200px] overflow-hidden bg-slate-700 text-[30px] rounded-2xl">
                    <h1 class="absolute mt-[-1px] text-white ml-[4px] text-[30px] rounded-2xl font-bold">Users:</h1>
                    <p class="relative mt-2 top-9 text-[19px] ml-[6px] text-white rounded-2xl">Total Users: {{$total}}</p>
                    <p class="relative mt-2 top-9 text-[19px] ml-[6px] text-white rounded-2xl">Number of Admins: {{$adminCount}}</p>
                    <p class="relative mt-2 top-9 text-[19px] ml-[6px] text-white rounded-2xl">Number of Comittees: {{$ComitteeCount}}</p>
                    <div class="progress relative mt-2 top-9 text-[19px] ml-[6px] text-white rounded-2xl">
                        <div class="progress-bar" style="width: {{$total}}rem;"></div>
                    </div>
                </div>
                <div class="h-[200px] overflow-y-scroll bg-slate-700 text-[30px] rounded-2xl">
                    <h1 class=" mt-1 text-white ml-[4px] text-[20px] rounded-2xl font-bold">Teams:</h1>
                    @php
                    $index = 1;
                    @endphp

                    @foreach ($teams as $team)
                    <p class="relative mt-1 top-2 text-[19px] ml-[6px] text-white rounded-2xl ">
                        {{$index++}}. {{$team->team}}
                    </p>
                    @endforeach
                </div>

                <div class="h-[200px] overflow-scroll bg-slate-700 text-[30px] rounded-2xl">
                    <h1 class="mt-1 text-white ml-[4px] text-[20px] rounded-2xl font-bold">Comittees:</h1>
                    @php
                    $index = 1;
                    @endphp

                    @foreach ($teams as $team)
                    <p class="relative mt-2 top-9 text-[19px] ml-[6px] text-white rounded-2xl ">
                        {{$index++}}. {{$team->team}}
                    </p>
                    @endforeach
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
            <a href="{{route('top3')}}" class="relative flex items-center w-auto rounded-full cursor-pointer top-6 hover:bg-sky-700 active:bg-sky-700 bg-sky-700">
                <i class="relative fas fa-tachometer-alt left-5"></i>
                <span class="relative left-7">Dashboard</span>
            </a>
            <a href="{{route('view.Game')}}" class="relative flex items-center w-auto gap-1 mt-4 rounded-full cursor-pointer top-6 hover:bg-sky-700">
                <i class="relative fas fa-basketball-ball left-5"></i>
                <span class="relative left-7">Games</span>
            </a>
            <a href="{{route('comitteePlayers')}}" class="relative flex items-center w-auto gap-1 mt-4 rounded-full cursor-pointer top-6 hover:bg-sky-700 ">
                <i class="relative fas fa-users left-5"></i>
                <span class="relative left-7">Players</span>
            </a>
            <a href="{{ route('ComitteeSettings', ['comitteeID' => Auth::guard('committees')->id()]) }}" class="relative flex items-center w-auto gap-1 mt-4 rounded-full cursor-pointer top-6 hover:bg-sky-700">
                <i class="relative fas fa-cog left-5"></i>
                <span class="relative left-7">Settings</span>
            </a>
            <form action="{{route('admin.logout')}}" method="post">
                @csrf
                @method('post')
            <button type="submit" class="relative flex items-center w-full gap-1 mt-4 rounded-full cursor-pointer top-6 hover:bg-sky-700 lg:relative lg:flex">
                <i class="relative fas fa-sign-out left-5"></i>
                <span class="relative left-7">Sign out</span>
            </button>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
</body>
</html>
