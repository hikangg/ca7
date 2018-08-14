@extends('layouts.app')

@section('content')
    <div id="cax" class="container">
        <div class="row">
            <div class="col-md-3" style="z-index: 1">
                <cax-selector-panel :selection="selection"></cax-selector-panel>
            </div>

            <div class="col-md-8 col-md-offset-1">
                <cax-brands :showmodels=true></cax-brands>
            </div>

        </div>
    </div>

@endsection