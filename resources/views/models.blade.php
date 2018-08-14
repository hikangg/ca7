@extends('layouts.app')

@section('content')
    <div id="cax" class="container">
        <div class="row">

            <nav class="col-md-3" style="z-index: 1">
                <div class="panel panel-default"  data-spy="affix" data-offset-top="205">
                    <div class="panel-heading">Current Selection</div>

                    <div class="panel-body" v-if="selection.length > 0">
                        <ul class="nav nav-pills nav-stacked" v-for="id in selection">
                            <li><a href="#">id @{{ id }}</a></li>
                        </ul>
                    </div>

                    <div class="panel-footer">
                        <div>
                            Selected ids: @{{ selection }}
                        </div>
                    </div>
                </div>
            </nav>

            <div class="col-md-8 col-md-offset-1">
                <cax-models></cax-models>
            </div>

        </div>
    </div>

@endsection