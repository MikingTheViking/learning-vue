<template>
    <p>my-message = {{ myMessage }}</p>
</template>
<script>
export default {
    data (){
        return {};
    },
    props: [
        'myMessage'
    ]
}
</script>