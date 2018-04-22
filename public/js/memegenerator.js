let topTextInput, bottomTextInput, topTextSizeInput, bottomTextSizeInput, imageInput, generateBtn, canvas, ctx , dataUrl;

function generateMeme (img, topText, bottomText, topTextSize, bottomTextSize) {
    let fontSize;

    // Size canvas to image
    canvas.width = img.width;
    canvas.height = img.height;

    // Clear canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    // Draw main image
    ctx.drawImage(img, 0, 0);

    // Text style: white with black borders
    ctx.fillStyle = 'white';
    ctx.strokeStyle = 'black';
    ctx.textAlign = 'center';

    // Top text font size
    fontSize = canvas.width * topTextSize;
    ctx.font = fontSize + 'px Impact';
    ctx.lineWidth = fontSize / 20;

    // Draw top text
    ctx.textBaseline = 'top';
    topText.split('\n').forEach(function (t, i) {
        ctx.fillText(t, canvas.width / 2, i * fontSize, canvas.width);
        ctx.strokeText(t, canvas.width / 2, i * fontSize, canvas.width);
    });

    // Bottom text font size
    fontSize = canvas.width * bottomTextSize;
    ctx.font = fontSize + 'px Impact';
    ctx.lineWidth = fontSize / 20;

    // Draw bottom text
    ctx.textBaseline = 'bottom';
    bottomText.split('\n').reverse().forEach(function (t, i) { // .reverse() because it's drawing the bottom text from the bottom up
        ctx.fillText(t, canvas.width / 2, canvas.height - i * fontSize, canvas.width);
        ctx.strokeText(t, canvas.width / 2, canvas.height - i * fontSize, canvas.width);
    });
    dataUrl = canvas.toDataURL();
    document.getElementById("result").src = dataUrl;
}

function init () {
    // Initialize variables
    topTextInput = document.getElementById('top-text');
    bottomTextInput = document.getElementById('bottom-text');
    topTextSizeInput = document.getElementById('top-text-size-input');
    bottomTextSizeInput = document.getElementById('bottom-text-size-input');
    /*imageInput = document.getElementById('image-input');*/
    generateBtn = document.getElementById('generate-btn');
    canvas = document.getElementById('meme-canvas');
    
    ctx = canvas.getContext('2d');

    canvas.width = canvas.height = 0;

    // Default/Demo text
    topTextInput.value = bottomTextInput.value = 'Demo\nText';

    // Generate button click listener
    generateBtn.addEventListener('click', function () {
        // Read image as DataURL using the FileReader API
        let reader = new FileReader();
        reader.readAsDataURL(imageInput);
        reader.onload = function () {
            let img = new Image;
            img.src = reader.result;
            setTimeout(function(){
                  generateMeme(img, topTextInput.value, bottomTextInput.value, topTextSizeInput.value, bottomTextSizeInput.value);
            },1000);
           };
        
    });
}

/*init();*/

var meme = {
    save:function(){
        $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
       });
        $.post(baseUrl+'save-meme',{img:dataUrl,category:$('#category').val()})
        .done(function(){

        });
    },
    publish:function(){
        $('#secondStep').addClass('inactive');
        $('#thirdStep').removeClass('inactive');
    }

}
let dropArea = document.getElementById('drop-area');
dropArea.addEventListener('dragenter', function(e){
    preventDefaults(e);
    hightlight();
}, false);
dropArea.addEventListener('dragleave', function(e){
    preventDefaults(e);
    unhighlight();
}, false);
dropArea.addEventListener('dragover', function(e){
    preventDefaults(e);
    hightlight();
}, false);
dropArea.addEventListener('drop', function(e){
    preventDefaults(e);
    handleDrop(e);
    unhighlight();
}, false);



function nextStep(files){
    $('#firstStep').addClass('inactive');
    $('#secondStep').removeClass('inactive');
    init();
    /*loadImg();*/
    let reader = new FileReader()
    reader.readAsDataURL(files[0]);
    reader.onloadend = function() {
        let img = new Image;
        document.getElementById("result").src = reader.result;
    }
    
}
function handleDrop(e) {
  var dt = e.dataTransfer;
  var files = dt.files;

  handleFiles(files);
  
}
function preventDefaults(e){
    e.preventDefault();
    e.stopPropagation();
}
function handleFiles(files) {
 nextStep(files);
 imageInput = files[0];
}
function hightlight(){
    dropArea.classList.add('highlight');
}
function unhighlight(){
 dropArea.classList.remove('highlight');
}