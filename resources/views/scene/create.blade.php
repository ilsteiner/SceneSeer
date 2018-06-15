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
                    echo Form::label('playwright', 'Playwright');
                    echo Form::select('playwright', App\Playwright::all()->pluck('name','id'), null, ['placeholder' => 'Select a playwright...']);
                ?>
            </div>
                
            <div class="col-6">
                <?php
                    echo Form::label('play', 'Play');
                    echo Form::select('play', App\Play::all()->pluck('title','id'), null, ['placeholder' => 'Select a play...']);
                ?>
            </div>
        </div>
    {{ Form::close() }}
    <div class="row">
        <div class="col">
            <h2>Characters</h2>
        </div>
    </div>
    <div class="row" id="character-list-headers">
        <div class="col">
            <h3>Name</h3>
        </div>
        <div class="col">
            <h3>Description</h3>
        </div>
    </div>
    <div class="row" id="characters">
    </div>
@endsection