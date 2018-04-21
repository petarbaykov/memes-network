@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <h1>Create new meme</h1>
      <div class="form-group">
            <label>Upper text</label>
            <textarea id="top-text" class="form-control"></textarea>
           
        </div>
        <div class="form-group">
             Text size: <input type="range" id="top-text-size-input" min="0.05" max="0.25" value="0.15" step="0.01"  class="form-control-range"> 
        </div>
        <hr>
         <div class="form-group">
            <label>Down text</label>
            <textarea id="bottom-text"  class="form-control"></textarea>
           
        </div>
         <div class="form-group">
             Text size: <input type="range" id="bottom-text-size-input" min="0.05" max="0.25" value="0.15" step="0.01"  class="form-control-range">
         </div>
        <div class="form-group">
            <input type="file" id="image-input" accept="image/*" class="form-control">
        </div>
       <div class="form-group">
            <button id="generate-btn" class="btn btn-primary">Generate!</button>

             <button id="save" onclick="meme.save()" class="btn btn-success">SAVE!</button>
       </div>
        <p>
            <canvas id="meme-canvas" style="display:none;" title="Right click -> &quot;Save image as...&quot;"></canvas>
        </p>
        <img id="result" src="">
        <div class="form-group">
            <select name="category" id="category" class="form-control">
            @foreach($categories as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
            </select>
         </div>
        </div>
    </div>
    
<script src="{{ asset('js/memegenerator.js') }}"></script>
@endsection