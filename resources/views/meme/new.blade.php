@extends('layouts.app')
<style>
    #app{height:100%;}
</style>
@section('content')

<div class="appContainer">
        <div class="container">
            <h1 class="newMemeTitle">Create new meme</h1>

            <div class="steps justifyFlex">
                <div class="stepCircle"><span class="fa fa-check"></span></div>
                <div class="stepLine"></div>
                <div class="stepCircle"><span>2</span></div>
                <div class="stepLine stepLine2"></div>
                <div class="stepCircle"><span>3</span></div>
            </div>
            <div class="memeSteps" id="firstStep">
                <div id="drop-area">
                    <form class="uploadForm">
                        <span class="fa  fa-cloud-upload"></span>  
                        <p>Upload your image</p>
                        <br>
                        <input type="file" id="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)">
                        <label class="chooseBtn" for="fileElem">Select some files</label>

                        
                    </form>
                </div>
            </div>
            <div class="memeSteps inactive" id="secondStep">
                <div class="row">
                    <div class="col-6">
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
                                <button id="generate-btn" class="btn btn-primary">Generate!</button>
                                <button onclick="meme.publish()" class="btn btn-success">Publish!</button>
                                
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <input type="file" id="image-input" accept="image/*" class="form-control">
                    </div>-->
                    <div class="col-6">
                        
                        <p>
                            <canvas id="meme-canvas" style="display:none;" title="Right click -> &quot;Save image as...&quot;"></canvas>
                        </p>
                        <div class="previewMeme">
                            <img id="result" src="">
                            <div id="loadingMeme"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="memeSteps inactive" id="thirdStep">
                <div class="row">
                    <div class="col-6">
                        <div class="previewMeme">
                            <img id="finalMeme">
                        </div>
                    </div>
                    <div class="col-6">
                         <div class="alert alert-success inactive" role="alert" id="successPublish">
                            <h4 class="alert-heading">Meme Published!</h4>
                            <p>Your meme was published successfully!</p>
                        </div>   
                            <div class="form-group">
                                <label>Choose category</label>
                                <select name="category" id="category" class="form-control">
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                                </select>
                            </div>
                             <button id="save" onclick="meme.save()" class="btn btn-success">PUBLISH MEME!</button>
                    </div>
                </div>
            </div>
            <!--
     -->
</div>
<script src="{{ asset('js/memegenerator.js') }}"></script>

@endsection