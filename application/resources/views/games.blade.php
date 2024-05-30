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
    </div>

    <main class="relative h-screen md:h-[30%] xl:h-[30%] rounded-full lg:h-80 sm:h-96 2xl:h-[100%] bg-slate-500 text-black left-[299px] top-[200px]  float-end">
        <h1 class="absolute text-[50px] right-[200px] bottom-[20px] 2xl:left-[-291px] xl:left-[-300px]">Games:</h1>
        <div class="relative">
            <div class="absolute overflow-hidden grid self-center left-[-300px] grid-cols-1 items-center justify-center grid-rows-3 rounded-tl-lg gap-4 h-[1050px] text-center w-[1600px] bg-slate-500">
                <button type="button" data-bs-target="#create" data-bs-toggle="modal" class="absolute top-2 w-36 float-end btn btn-primary">Create New</button>
                <div class="mb-16 overflow-hidden bg-slate-700">
                    <table class="absolute table table-dark table-hover top-[50px]  overflow-auto">
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
                            <th>Edit</th>
                            <th>Delete</th>
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
                            <td><a href="{{route('game.edit',['id'=>$game])}}" class=" btn btn-primary">Edit</a></td>
                            <td>
                                <form action="{{route('game.delete', ['id'=>$game])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="create">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Create Records</h3>
                            <button type="button" class="btn-close" data-bs-target="#create" data-bs-toggle="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form action="{{ route('game.store') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="teamname" class="form-label">Team Name</label>
                                        <input type="text" class="form-control" id="teamname" name="teamname" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="game1" class="form-label">Game 1</label>
                                        <input type="number" class="form-control" id="game1" name="game1" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="game2" class="form-label">Game 2</label>
                                        <input type="number" class="form-control" id="game2" name="game2" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="game3" class="form-label">Game 3</label>
                                        <input type="number" class="form-control" id="game3" name="game3" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="wins" class="form-label">Wins</label>
                                        <input type="number" class="form-control" id="wins" name="wins" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="losses" class="">Losses</label>
                                        <input type="number" class="form-control" id="losses" name="losses" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date_played" class="form-label">Date Played</label>
                                        <input type="date" class="form-control" id="date_played" name="date_played" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        </div>
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
            <a href="{{route('dashboard')}}" class="relative flex items-center w-auto rounded-full cursor-pointer top-6 hover:bg-sky-700">
                <i class="relative fas fa-tachometer-alt left-5"></i>
                <span class="relative left-7">Dashboard</span>
            </a>
            <a href="{{route('game1.index')}}" class="relative flex items-center w-auto gap-1 mt-4 rounded-full cursor-pointer top-6 hover:bg-sky-700 active:bg-sky-700 bg-sky-700">
                <i class="relative fas fa-basketball-ball left-5"></i>
                <span class="relative left-7">Games</span>
            </a>
            <a href="{{route('user')}}" class="relative flex items-center w-auto gap-1 mt-4 rounded-full cursor-pointer top-6 hover:bg-sky-700">
                <i class="relative fas fa-users left-5"></i>
                <span class="relative left-7">Users</span>
            </a>
            <a href="{{route('game.create')}}" class="relative flex items-center w-auto gap-1 mt-4 rounded-full cursor-pointer top-6 hover:bg-sky-700">
                <i class="relative fas fa-trophy left-5"></i>
                <span class="relative left-7">Team Rankings</span>
            </a>
            <a href="{{route('profile.edit')}}" class="relative flex items-center w-auto gap-1 mt-4 rounded-full cursor-pointer top-6 hover:bg-sky-700">
                <i class="relative fas fa-cog left-5"></i>
                <span class="relative left-7">Settings</span>
            </a>
            <form action="{{route('logout')}}" method="post">
                @csrf
                @method('post')
            <button type="submit" class="relative flex items-center w-full gap-1 mt-4 rounded-full cursor-pointer top-6 hover:bg-sky-700 lg:relative lg:flex">
                <i class="relative fas fa-sign-out left-5"></i>
                <span class="relative left-7">Sign out</span>
            </button>
            </form>
        </div>
    </div>
</body>
</html>
