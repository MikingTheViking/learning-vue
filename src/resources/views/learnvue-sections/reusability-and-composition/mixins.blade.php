<section name="Mixins">
    <h3><a href="https://vuejs.org/v2/guide/mixins.html">Mixins</a></h3>

    <h4><a href="https://vuejs.org/v2/guide/mixins.html#Basics">Basics</a></h4>

    <p>Mixins are a flexible way to distribute functionalities for Vue components. A mixin can contain any component options. When a component uses a mixin, all options in the mixin will be "mixes" into the component's own options.</p>

    <pre>//define a mixin object
var myMixin= {
    created: function () {
        this.hello();
    },
    methods: {
        hello: function () {
            console.log('Hello from mixin');
        }
    }
}

//define a component that uses the mixin
var Component = Vue.extend({
    mixins: [myMixin]
});

var component = new Component();    //outputs "Hello from mixin"
</pre>

    


</section>