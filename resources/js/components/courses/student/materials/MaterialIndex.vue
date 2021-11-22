<template>
    <div class="card-body ">

        <div class="card-description row">

            <router-link tag="button" :to="{name: 'studentIndexLesson', params: {course_id: courseId}}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon mr-2">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>

            {{user.first_name}} {{user.last_name}}


        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card" v-for="material, index in materials">
                <div class="card" >
                    <div class="card-body">
                        <h4 class="card-title">{{material.title}}</h4>
                        <p class="card-description">
                            <i v-if="material.material_type_id===1">Lecture</i>
                            <i v-else-if="material.material_type_id===2">Practice</i>
                            <i v-else-if="material.material_type_id===3">Theory</i>

                        </p>

                        <p class="text-right">
                            <router-link tag="button" :to="{name: ''}" type="button"
                                         class="btn  btn-outline-light btn-rounded btn-icon bg-bitlab">
                                <i class="fas fa-eye"></i>
                            </router-link>
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>

    export default {
        data: function () {
            return {
                materials: [],
                lessonId:{},
                courseId:{},
                user:{},
            }
        },
        mounted() {
            let app = this;
            app.lessonId = app.$route.params.lesson_id;
            axios.get('api/v1/users/current')
                .then(function (resp) {
                    app.user = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    bootbox.alert("Could not load user");
                });
            axios.get('/api/v1/materials/'+app.lessonId)
                .then(function (resp) {
                    app.materials = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    bootbox.alert("Could not load material");

                });
            axios.get('/api/v1/lessonsShow/'+app.lessonId)
                .then(function (resp) {
                    app.courseId = resp.data.course_id;
                })
                .catch(function (resp) {
                    console.log(resp);
                    bootbox.alert("Could not load course");

                });

        },

    }
</script>

<style scoped>

</style>
