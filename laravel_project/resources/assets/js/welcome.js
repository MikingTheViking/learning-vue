/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//Three.js Logo animation
var THREE = require('three');

var renderer = null,
    scene = null,
    camera = null,
    cube = null,
    animating = true;


    /*
     * Get the container where we draw the Square
     * @type @exp;document@call;getElementById
     */
    var container = document.getElementById("container");
    /*
     * Creates a THREE.js renderer and add it to the container.
     */
    renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true }); //aplha to enable transparency
    renderer.setSize(container.offsetWidth, container.offsetHeight);
    container.appendChild(renderer.domElement);
    /*
     * Create a THREE.js Scene
     */
    scene = new THREE.Scene();
    /*
     * Create a Perspective camera and add it to the Scene
     */
    camera = new THREE.PerspectiveCamera(45, container.offsetWidth / container.offsetHeight, 1, 4000);
    camera.position.set(0, 0, 3);
    scene.add(camera);
    /*
     * Create a Directional Light to show off the object
     */
    var light = new THREE.DirectionalLight(0xffffff, 1.5);
    light.position.set(400, 400, 400);
    scene.add(light);
    /*
     * Create a shaded texture map using an image and
     * add it to the scene.                
     *                  *
     */
    var mapURL = "images/vikings.jpg";
    var map = THREE.ImageUtils.loadTexture(mapURL);
    /*
     * Create a MeshPhongMaterial for Shiny surface to show shading
     * with the texture added above.
     */
    var material = new THREE.MeshPhongMaterial({ specular: 0x555555, map: map });
    /*
     * Create a Cube Geometry.
     */
    var geometry = new THREE.CubeGeometry(1, 1, 1);
    /*
     * Add the geometry and material to mesh.
     */
    cube = new THREE.Mesh(geometry, material);
    cube.rotation.x = Math.PI / 5;
    cube.rotation.y = Math.PI / 5;
    /*
     * Add the Cube to the Scene.
     */
    scene.add(cube);
    /*
     * Add a mouse up handler to toggle the animation
     */
    //addMouseHandler();
    /*
     *  Run our render loop
     */
    runRenderLoop();

function runRenderLoop() {
    /*
     * Render the Scene
     */
    renderer.render(scene, camera);
    /*
     * Spin the cube for next animation frame
     */
    if (animating) {
        cube.rotation.y -= 0.01;
        cube.rotation.z -= 0.01;
    }
    /*
     * Ask for another frame.
     */
    requestAnimationFrame(runRenderLoop);
}
function addMouseHandler() {
    var domEle = renderer.domElement;
    domEle.addEventListener("mouseup", onMouseUp, false);
}
function onMouseUp(event) {
    event.preventDefault();
    animating = !animating;
}