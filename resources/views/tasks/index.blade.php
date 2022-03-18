<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo App</title>
    <link rel="stylesheet" href="/css/styles.css">
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
                            <a href="{{route('tasks.index',['id' => $folder->id]) }}" class="list-group-item">
                                {{ $folder->title }}
                            </a>
                            @endforeach
                        </div>
                    </nav>
                </div>
                <div class="columun col-md-8">
                    <!-- タスク表示 -->
                </div>
            </div>
        </div>
    </main>
</body>

</html>