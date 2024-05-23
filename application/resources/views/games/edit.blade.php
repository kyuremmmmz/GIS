<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Create Game Record</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1>Create Game Record</h1>
            </div>
            <div class="card-body">
                <form action="{{route('game.update',['id'=>$game])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="games" class="form-label">Games</label>
                        <input type="text" class="form-control" id="games" name="games" value="{{$game->games}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="player_standing" class="form-label">Player Standing</label>
                        <input type="text" class="form-control" id="player_standing" name="player_standing" value="{{$game->player_standing}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="players" class="form-label">Players</label>
                        <input type="text" class="form-control" id="players" name="players" value="{{$game->players}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="team_standing" class="form-label">Team Standing</label>
                        <input type="text" class="form-control" id="team_standing" name="team_standing" value="{{$game->team_standing}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_played" class="form-label">Date Played</label>
                        <input type="date" class="form-control" id="date_played" name="date_played"  value="{{$game->date_played}}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
