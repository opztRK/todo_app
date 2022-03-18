@extends("layouts.app")
@section("content")
<div class="row">
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-header">
                Todoの詳細
            </div>
            <div class="card-body">
                <a href="{{url('todolist')}}" class="btn btn-info">戻る</a>
                <table class="table">
                    <dl>
                        <tr>
                            <td>
                                <dt>No</dt>


                                <dd>{{$todo->id}}</dd>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <dt>Todo</dt>

                                <dd>{{$todo->title}}</dd>
                            </td>
                        </tr>
                    </dl>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection