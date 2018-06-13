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
        <div class="row">
            <div class="col-6">
                <?php
                    echo Form::select('playwright', App\Playwright::all()->pluck('name','id'), null, ['placeholder' => 'Select a playwright...']);
                ?>
            </div>
                
            <div class="col-6">
                <?php
                    echo Form::select('play', App\Play::all()->pluck('title','id'), null, ['placeholder' => 'Select a play...']);
                ?>
            </div>
        </div>
    {{ Form::close() }}

    <div class="row" id="characters">
    </div>
@endsection