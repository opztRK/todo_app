@extends("layouts.app")
@section("content")
<div class="row">
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-header">
                Todo　一覧
            </div>
            <div class="card-body">
                @if(session('status'))
                <div class="alert alert-succsess" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <a href="{{ url('todolist/create')}}" class="btn btn-primary mb3">作成</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Todo</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $todo)
                        <tr>
                            <td>{{$todo->id}}</td>
                            <td>{{$todo->title}}</td>
                            <td><a href="{{url('todolist/'.$todo->id)}}" class="btn btn-secondary">詳細</a></td>
                            <td><a href="{{url('todolist/'.$todo->id.'/edit')}}" class="btn btn-success">編集</a></td>
                            <td>
                                <form action="/todolist/{{ $todo->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type=submit class="btn btn-danger">削除</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection