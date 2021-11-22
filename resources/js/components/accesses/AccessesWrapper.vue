<template>
    <div class="container-fluid">
        <div class="card-header bg-bitlab">
            <i class="mdi mdi-account-key menu-icon text-white"></i>
        </div>
        <div class="card">

            <router-view></router-view>

        </div>
    </div>
</template>

<script>

    export default {
        name: "AccessesWrapper.vue",
    }
</script>

<style scoped>
    i {
        display: inline-block;
        font-size: 20px;
        width: 40px;
        text-align: left;
        color: #4d83ff;
        cursor: pointer;
    }

    .card .card-title {
        color: #4a4a4a;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        font-size: .875rem;
        font-weight: bold;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid #e7eaed;
        border-radius: 0;
    }

    .card .card-body {
        padding: 1.5rem 1.875rem;
        flex: 1 1 auto;
    }

    div {
        display: block;
    }

    body {
        font-size: 1rem;
        font-family: "Roboto", sans-serif;
        font-weight: initial;
        line-height: normal;
        -webkit-font-smoothing: antialiased;
        text-align: left;
        background-color: #fff;
    }

    p {
        font-size: 0.875rem;
        line-height: 1.3rem;
    }

    a, div, h1, h2, h3, h4, h5, p, span {
        text-shadow: none;
    }

    p {
        margin-top: 0;
    }

    *, *::before, *::after {
        box-sizing: border-box;
    }

    p {
        display: block;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
    }
</style>
