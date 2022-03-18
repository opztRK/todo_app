@extends("layouts.app")
@section("content")
<div class="row">
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-header">
                Todoの編集
            </div>
            <div class="card-body">
                <form action="/todolist/{{$todo->id}}" method="post">
                    @csrf
                    @method('put')
                    <table class="table">
                        <tr>
                            <td>

                                    <dt>No</dt>
                                    <dd>{{$todo->id}}</dd>

                            </td>
                        </tr>
                        <div class="formgroup">
                            <tr>
                                <td>
                                    <label>
                                        <dt>Todo</dt>
                                        <dd><input type="text" name="title" class="form-control" value="{{$todo->title}}"></dd>
                                    </label>
                                </td>
                            </tr>
                        </div>
                        <tr>
                            <td>
                                <button type="submit" class="btn btn-primary">更新</button>
                            </td>
                            <td>
                                <a href="{{url('todolist')}}" class="btn btn-info">戻る</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection