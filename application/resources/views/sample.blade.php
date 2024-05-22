<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    @foreach ($post as $posts)
    <div class="overflow-x-auto">
        <table class="border border-collapse border-gray-400 table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-400">Id</th>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-400">Age</th>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-400">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-2 border border-gray-400">{{ $posts->id }}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$posts->date_played}}</td>
                    <td class="px-4 py-2 border border-gray-400">john@example.com</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border border-gray-400">Jane Smith</td>
                    <td class="px-4 py-2 border border-gray-400">25</td>
                    <td class="px-4 py-2 border border-gray-400">jane@example.com</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    @endforeach


</body>
</html>
