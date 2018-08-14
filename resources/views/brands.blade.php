@extends('layouts.app')

@section('content')
    <div id="cax" class="container">
        <cax-brands-nav-bar></cax-brands-nav-bar>

        <cax-brands-view-mode-selector :showmodels="false"></cax-brands-view-mode-selector>
    </div>

@endsection