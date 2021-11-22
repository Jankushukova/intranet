<template>

    <div class="card-body ">
        <div class="card-description row">
            <router-link tag="button" :to="{name: 'createUser'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-plus"></i>
            </router-link>

        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <router-link tag="a" class="card-body  btn btn-outline-dark" :to="{ name: 'indexUserTeacher' }">
                        <i class="fal fa-chalkboard-teacher fa-4x"></i>
                        <p class="text-center">
                            Teachers
                        </p>
                    </router-link>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <router-link tag="a" class="card-body  btn btn-outline-dark" :to="{ name: 'indexUserStudent' }" >
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

</script>

<style scoped>

</style>
