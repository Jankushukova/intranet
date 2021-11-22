<template>
    <div class="card-body ">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <router-link tag="a" class="card-body  btn btn-outline-dark" :to="{ name: 'teacherAccessIndex' }">
                        <i class="fal fa-chalkboard-teacher fa-4x"></i>
                        <p class="text-center">
                            Teachers
                        </p>
                    </router-link>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <router-link tag="a" class="card-body  btn btn-outline-dark" :to="{ name: 'studentAccessIndex' }" >
                        <i class="fal fa-users-class fa-4x"></i>
                        <p class="text-center">
                            Students
                        </p>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data: function () {
            return {}
        },
    }
</script>

<style scoped>


</style>
