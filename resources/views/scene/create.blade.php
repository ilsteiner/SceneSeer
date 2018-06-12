@extends('master')

<?php
    use App\Playwright;
    use App\Play;
?>

@section('title')
Make a scene
@endsection

@section('content')
    {{ Form::open(array('url' => 'scenes/save')) }}
        {{--  Get all the playwrights  --}}
        <?php            
            echo Form::select('playwright', App\Playwright::all()->pluck('name','id'), null, ['placeholder' => 'Select a playwright...']);

            echo Form::select('play', App\Play::all()->pluck('title','id'), null, ['placeholder' => 'Select a play...']);
        ?>
    {{ Form::close() }}
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/create_scene.js') }}"></script>
@endsection