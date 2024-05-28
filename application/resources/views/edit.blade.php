<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Game Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1>Create Game Record</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('game.update', ['id'=>$game]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="teamname" class="form-label">Team Name</label>
                        <input type="text" class="form-control" id="teamname" value="{{$game->teamname}}" name="teamname" required>
                    </div>
                    <div class="mb-3">
                        <label for="game1" class="form-label">Game 1</label>
                        <input type="number" class="form-control" id="game1" value="{{$game->game1}}" name="game1" required>
                    </div>
                    <div class="mb-3">
                        <label for="game2" class="form-label">Game 2</label>
                        <input type="number" class="form-control" id="game2" value="{{$game->game2}}" name="game2" required>
                    </div>
                    <div class="mb-3">
                        <label for="game3" class="form-label">Game 3</label>
                        <input type="number" class="form-control" id="game3" value="{{$game->game3}}" name="game3" required>
                    </div>
                    <div class="mb-3">
                        <label for="wins" class="form-label">Wins</label>
                        <input type="number" class="form-control" value="{{$game->wins}}" id="wins" name="wins" required>
                    </div>
                    <div class="mb-3">
                        <label for="losses" class="form-label">Losses</label>
                        <input type="number" class="form-control" value="{{$game->losses}}" id="losses" name="losses" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_played" class="form-label">Date Played</label>
                        <input type="date" class="form-control" value="{{$game->date_played}}" id="date_played" name="date_played" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
