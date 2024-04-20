var loadImage = function (event) {
    var image = document.getElementById('output-img');
    console.log();
    image.src = URL.createObjectURL(event.target.files[0]);
    // var input_music = document.getElementById('label-music');
    // input_music.textContent = "Almashtirish";
    // input_music.classList.add('selected');
};