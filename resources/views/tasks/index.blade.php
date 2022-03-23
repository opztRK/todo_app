<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo App</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header>
        <nav class="my-navbar">
            <a href="/" class="my-navbar-brand">ToDo App</a>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col col-md-4">
                    <nav class="panel panel-default">
                        <nav class="panel panel-heading">フォルダ</nav>
                        <div class="panel-body">
                            <a href="" class="btn btn-default btn-block">
                                フォルダを追加する
                            </a>
                        </div>
                        <div class="list-group">
                            @foreach($folders as $folder)
                            <a href="{{route('tasks.index',['id' => $folder->id]) }}" class="list-group-item {{$current_folder_id === $folder->id ? 'active' : ''}}">
                                {{ $folder->title }}
                            </a>
                            @endforeach
                        </div>
                    </nav>
                </div>
                @foreach($folders as $folder)
                <div>
                @foreach($folder as $value)
                <p> 値 {{$value}}</p>
                @endforeach
                </div>
                @endforeach
                <div class="columun col-md-8">
                    <!-- タスク表示 -->
                </div>
            </div>
        </div>
    </main>
</body>

</html>