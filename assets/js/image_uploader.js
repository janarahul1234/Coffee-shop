const dropArea = document.getElementById('drop-area');
const inputFile = document.getElementById('input-file');
const viewArea = document.getElementById('view-area');

function imageUpload(){
    let imgLink = URL.createObjectURL(inputFile.files[0]);
    viewArea.style.backgroundImage = `url(${imgLink})`;
    viewArea.style.border = "1px solid hsla(21, 59%, 7%, 0.15)";
    viewArea.textContent = "";
}

inputFile.addEventListener("change", imageUpload);

dropArea.addEventListener("dragover", function(e){
    e.preventDefault();
});

dropArea.addEventListener("drop", function(e){
    e.preventDefault();
    inputFile.files = e.dataTransfer.files;
    imageUpload();
});