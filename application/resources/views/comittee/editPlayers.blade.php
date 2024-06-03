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
                <h1>Edit Record</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('updatePlayerss', ['data'=>$data]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="playerid" class="form-label">Player Number</label>
                        <input type="text" class="form-control" id="playerid" value="{{$data->id}}" name="id" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" value="{{$data->name}}" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" id="age" min="0" value="{{$data->age}}" name="age" required>
                    </div>
                    <div class="mb-3">
                        <label for="teamname" class="form-label">Team Name</label>
                        <input type="text" class="form-control" id="teamname"  min="0" value="{{$data->teamname}}" name="teamname" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
