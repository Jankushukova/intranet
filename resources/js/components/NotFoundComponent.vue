<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-bitlab">
                            <i class="text-white fa fa-exclamation-triangle"></i>
                    </div>

                    <div class="card-body">
                        <h1 class="text-center text-muted">
                            <i class="fa fa-exclamation-circle"></i>
                            Error 404! Page not found
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
