@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <h1>Create new meme</h1>
              <p>
            <textarea id="top-text"></textarea>
            Text size: <input type="range" id="top-text-size-input" min="0.05" max="0.25" value="0.15" step="0.01">
        </p>
        <p>
            <textarea id="bottom-text"></textarea>
            Text size: <input type="range" id="bottom-text-size-input" min="0.05" max="0.25" value="0.15" step="0.01">
        </p>
        <p>
            <input type="file" id="image-input" accept="image/*">
        </p>
        <p>
            <button id="generate-btn">Generate!</button>

             <button id="save" onclick="meme.save()">SAVE!</button>
        </p>
        <p>
            <canvas id="meme-canvas" style="display:none;" title="Right click -> &quot;Save image as...&quot;"></canvas>
        </p>
        <img id="result" src="">
        </div>
    </div>
    
<script src="{{ asset('js/memegenerator.js') }}"></script>
@endsection