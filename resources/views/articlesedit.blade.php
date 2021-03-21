@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
    <form action="{{ url('articles/update') }}" method="POST">

        <!-- item_name -->
        <div class="form-group">
            <label for="item_name">Item</label>
            <input type="text" id="item_name" name="item_name" class="form-control" value="{{$article->item_name}}">
        </div>
        <!--/ item_name -->
        
        <!-- item_number -->
        <div class="form-group">
            <label for="item_number">Number</label>
        <input type="text" id="item_number" name="item_number" class="form-control" value="{{$article->item_number}}">
        </div>
        <!--/ item_number -->

        <!-- item_amount -->
        <div class="form-group">
            <label for="item_amount">Amount</label>
            <input type="text" id="item_amount" name="item_amount" class="form-control" value="{{$article->item_amount}}">
        </div>
        <!--/ item_amount -->
        
        <!-- expired -->
        <div class="form-group">
            <label for="expired">expired</label>
            <input type="datetime" id="expired" name="expired" class="form-control" value="{{$article->expired}}"/>
        </div>
        <!--/ expired -->
        
        <!-- Saveボタン/Backボタン -->
        <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link pull-right" href="{{ url('/') }}">
                <i class="glyphicon glyphicon-backward"></i>  Back
            </a>
        </div>
        <!--/ Saveボタン/Backボタン -->
    
        <!-- id値を送信 -->
        <input type="hidden" name="id" value="{{$article->id}}" />
        <!--/ id値を送信 -->
        
        <!-- CSRF -->
        {{ csrf_field() }}
        <!--/ CSRF -->
        
    </form>
    </div>
</div>
@endsection