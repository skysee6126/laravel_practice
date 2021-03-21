<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
    
    <!-- Bootstrap の定形コード... -->
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <div class="panel-body">
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        
        <!-- 本登録フォーム -->
        <form action="{{ url('articles') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            
            <!-- 本のタイトル -->
            <div class="form-group">
            <div class="col-sm-6">
                <label for="Food" class="col-sm-3 control-label">Food</label>
                <input type="text" name="item_name" id="item-name"class="form-control">
                </div>
                <div class="col-sm-6">
                <label for="amount" class="col-sm-3 control-label">金額</label>
                <input type="text" name="item_amount" id="item-amount" class="form-control">
                </div>
                <div class="col-sm-6">
                <label for="number" class="col-sm-3 control-label">数</label>
                <input type="text" name="item_number" id="item-number" class="form-control">
                </div>
                <div class="col-sm-6">
                <label for="expired" class="col-sm-3 control-label">期限</label>
                <input type="date" name="expired" id="item-expired" class="form-control">
                </div>
            </div>
            
            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-plus"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    
    @if (count($articles) > 0)
            <div class="panel panel-default">
                <div class="panel-heading"> 
                </div>
                <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>リスト一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <!-- 本タイトル -->
                            <td class="table-text">
                                <div>{{ $article->item_name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $article->item_amount }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $article->item_number }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $article->item_expired }}</div>
                            </td>
                            <!-- 本: 更新ボタン -->
                            <td>
                            <form action="{{ url('articlesedit/'.$article->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">
                            <i class="glyphicon glyphicon-trash"></i> 更新
                            </button>
                            </form>
                            </td>
                            <!-- 本: 削除ボタン -->
                            <td>
                            <form action="{{ url('article/'.$article->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> 削除
                            </button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    <div class="row">
    <div class="col-md-4 col-md-offset-4">
    {{ $articles->links()}}
    </div>
    </div>
    <!-- Book: 既に登録されてる本のリスト -->
@endsection