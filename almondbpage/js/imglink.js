var imgnewlink = document.getElementById("imgnewlink").src;
var images;
images = document.querySelectorAll("#almondbpage-advanced img");
for (var i = 0; i < images.length; i++) {
    var oldVal = images[i].getAttribute('src');
    images[i].setAttribute('src', imgnewlink + oldVal);
}