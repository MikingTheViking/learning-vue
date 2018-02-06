<template>

    <div id="container">
    </div>

</template>

<script>
    
let THREE = require('three');

export default {

    data() {
        return {
            renderer: null,
            scene: null,
            camera: null,
            cube: null,
            animating: true,
            container: null
        }
    },
    mounted() {
        console.log('LogoCube mounted, initializing.');
        this.initialize();
    },
    methods: {

        initialize() {
                        
            this.container = document.getElementById("container");

            /*
            * Creates a THREE.js renderer and add it to the container.
            */
            this.renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true }); //aplha to enable transparency
            this.renderer.setSize(this.container.offsetWidth, this.container.offsetHeight);
            this.container.appendChild(this.renderer.domElement);
            /*
            * Create a THREE.js Scene
            */
            this.scene = new THREE.Scene();
            /*
            * Create a Perspective camera and add it to the Scene
            */
            this.camera = new THREE.PerspectiveCamera(45, this.container.offsetWidth / this.container.offsetHeight, 1, 4000);
            this.camera.position.set(0, 0, 3);
            this.scene.add(this.camera);
            /*
            * Create a Directional Light to show off the object
            */
            var light = new THREE.DirectionalLight(0xffffff, 1.5);
            light.position.set(400, 400, 400);
            this.scene.add(light);
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
            this.cube = new THREE.Mesh(geometry, material);
            this.cube.rotation.x = Math.PI / 5;
            this.cube.rotation.y = Math.PI / 5;
            /*
            * Add the Cube to the Scene.
            */
            this.scene.add(this.cube);
            /*
            * Add a mouse up handler to toggle the animation
            */
            //addMouseHandler();
            /*
            *  Run our render loop
            */
            this.runRenderLoop();

        },
        runRenderLoop() {
            /*
            * Render the Scene
            */
            this.renderer.render(this.scene, this.camera);
            /*
            * Spin the cube for next animation frame
            */
            if (this.animating) {
                this.cube.rotation.y -= 0.01;
                this.cube.rotation.z -= 0.01;
            }
            /*
            * Ask for another frame.
            */
            requestAnimationFrame(this.runRenderLoop);
        },
        addMouseHandler() {
            var domEle = this.renderer.domElement;
            domEle.addEventListener("mouseup", this.onMouseUp, false);
        },
        onMouseUp(event) {
            event.preventDefault();
            this.animating = !this.animating;
        }
    }

}

</script>


<style lang="scss" scoped>

#container {
    min-width:300px;
    min-height:300px;
}


</style>