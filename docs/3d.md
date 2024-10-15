
<html lang="en">
<style>
    html, body {
  width: 100%;
  height: 100%;
  overflow: hidden;
  margin: 0;
}

body {
    background-image:url('https://wallpaperaccess.com/full/187161.jpg');
    background-size: cover;
}

#container {
    position: absolute;
    margin: auto;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 800px;
    height: 500px;
}

#btn_change_size {
    position: absolute;
    height: 30px;
    left: 10px;
    top: 10px;
}

</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark-Notify</title>
</head>

<body>
    <div id="container"></div>
</body>

</html>
<script src="https://pchen66.github.io/js/three/three.min.js"></script>
<script src="https://rawgit.com/pchen66/panolens.js/dev/build/panolens.min.js"></script>
<script>
var panorama, viewer, container, infospot;
var containerBaseWidth = 700;
var containerBaseHeight = 400;
var deltaSize = 100;

container = document.querySelector( '#container' );

panorama = new PANOLENS.ImagePanorama( 'https://pchen66.github.io/Panolens/examples/asset/textures/equirectangular/tunnel.jpg' );

infospot = new PANOLENS.Infospot( 350, PANOLENS.DataImage.Info );
infospot.position.set( 0, 0, -5000 );
infospot.addHoverText( 'Hello Panolens', 30 );
panorama.add( infospot );

viewer = new PANOLENS.Viewer( { container: container } );
viewer.add( panorama );

function changeContainerSize ( width, height ) {
  viewer.container.style.width = width + "px";
  viewer.container.style.height = height + "px";
  viewer.onWindowResize( width, height );
}

document.querySelector( '#btn_change_size' ).addEventListener( 'click', function(){
  var newWidth = containerBaseWidth + (Math.random() - 0.5) * deltaSize;
  var newHeight = containerBaseHeight + (Math.random() - 0.5) * deltaSize;
  changeContainerSize( newWidth, newHeight );
}, false );
</script>