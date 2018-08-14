@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Hello</h2>
                <cax-model :model_id="{{ $model->id }}">{{ $model->name }}</cax-model>
            </div>
        </div>
    </div>
@endsection