<template>
    <div class="card-body ">
        <div class="card-description row">

            <router-link tag="button" :to="{name: 'studentIndexCourse'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon mr-2">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>

            {{user.first_name}} {{user.last_name}}

        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card" v-for="lesson, index in lessons">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{lesson.title}}</h4>
                        <p class="card-description">
                            {{lesson.description}}
                        </p>

                        <p class="text-right">
                            <router-link tag="button" :to="{name: 'studentIndexMaterial', params: {lesson_id: lesson.id}}"
                                         type="button"
                                         class="btn  btn-outline-light btn-rounded btn-icon bg-bitlab">
                                <i class="fab fa-readme"></i>
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
        name: "lesson-view",
        data: function () {
            return {
                lessons: [],
                courseId: null,
                user:{},

            }
        },

        mounted() {
            let app = this;
            app.courseId = app.$route.params.course_id;
            axios.get('api/v1/users/current')
                .then(function (resp) {
                    app.user = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    bootbox.alert("Could not load user");
                });
            axios.get('/api/v1/lessons/' + app.courseId)
                .then(function (resp) {
                    app.lessons = resp.data;

                })
                .catch(function (resp) {
                    console.log(resp);
                    bootbox.alert("Could not load lesson");
                });


        },

    }
</script>

<style scoped>

</style>
