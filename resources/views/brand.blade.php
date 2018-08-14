@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3" style="z-index: 1">
                <cax-selector-panel :selection="selection"></cax-selector-panel>
            </div>

            <div class="col-md-8 col-md-offset-1">
                <cax-brand :brand="{{ $brand }}" :brand_id="{{ $brand->id }}">{{ $brand->name }}</cax-brand>
            </div>

        </div>
    </div>
@endsection