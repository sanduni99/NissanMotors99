/*var loadFile = function(image1) {
	var image = document.getElementById('img1');
	image.src = URL.createObjectURL(image1.target.files[0]);
};

var loadFile = function(image2) {
	var image = document.getElementById('img2');
	image.src = URL.createObjectURL(image2.target.files[0]);
};

var loadFile = function(image3) {
	var image = document.getElementById('img3');
	image.src = URL.createObjectURL(image3.target.files[0]);
};

var loadFile = function(image4) {
	var image = document.getElementById('img4');
	image.src = URL.createObjectURL(image4.target.files[0]);
};

var loadFile = function(image5) {
	var image = document.getElementById('img5');
	image.src = URL.createObjectURL(image5.target.files[0]);
};*/


window.onload = function() {
    //Check File API support
    if (window.File && window.FileList && window.FileReader) {
      var filesInput = document.getElementById("files");
      filesInput.addEventListener("change", function(event) {
        var files = event.target.files; //FileList object
        var output = document.getElementById("result");
        for (var i = 0; i < files.length; i++) {
          var file = files[i];
          //Only pics
          if (!file.type.match('image'))
            continue;
          var picReader = new FileReader();
          picReader.addEventListener("load", function(event) {
            var picFile = event.target;
            var div = document.createElement("div");
            div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
              "title='" + picFile.name + "'height='100'/>";
            output.insertBefore(div, null);
          });
          //Read the image
          picReader.readAsDataURL(file);
        }
      });
    } else {
      console.log("Your browser does not support File API");
    }
  }