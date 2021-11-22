<template>
    <div class="card-body ">
<!--        <div class="card-title" v-if="course!=''">-->
<!--            {{course.title}}-->
<!--        </div>-->
        <div class="card-description row">

            <router-link tag="button" :to="{name: 'indexCourse'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon mr-2">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>

            <router-link tag="button" :to="{name: 'createLesson',params:{course_id:courseId}}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-plus"></i>
            </router-link>

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
                            <router-link tag="button" :to="{name: 'indexMaterial', params: {lesson_id: lesson.id}}"
                                         type="button"
                                         class="btn  btn-outline-light btn-rounded btn-icon bg-bitlab">
                                <i class="fab fa-readme"></i>
                            </router-link>
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                                <span class="mdi mdi-pound ">
                                    {{lesson.lesson_order}}
                                </span>

                            </div>
                            <div class="col-lg-6">
                                <p class="text-right">
                                    <router-link tag="button" class="btn btn-icon"
                                                 :to="{name: 'editLesson',params: {lesson_id: lesson.id}}">
                                        <i class="mdi mdi-border-color "></i>
                                    </router-link>

                                    <button class="btn btn-icon">
                                        <i class="mdi mdi-delete " v-on:click="deleteEntry(lesson.id, index)"></i>
                                    </button>
                                </p>
                            </div>
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
                courseId: {},
                course: {},
            }
        },

        mounted() {
            let app = this;
            app.courseId = app.$route.params.course_id;
            axios.get('/api/v1/lessons/' + app.courseId)
                .then(function (resp) {
                    app.lessons = resp.data;

                })
                .catch(function (resp) {
                    console.log(resp);
                    bootbox.alert("Could not load lesson");
                });

            axios.get('/api/v1/courses/' + app.courseId)
                .then(function (resp) {
                    app.course = resp;
                })
                .catch(function (err) {
                    console.log(err);
                    alert('Could not load course');
                })
        },
        methods: {
            deleteEntry(id, index) {
                var app = this;
                bootbox.confirm("Do you really want to delete it?", function(result){
                    if(result){
                        axios.delete('/api/v1/lessons/' + id)
                            .then(function (resp) {
                                app.lessons.splice(index, 1);
                            })
                            .catch(function (resp) {
                                bootbox.alert("Could not delete lesson");
                            });
                    }
                });
            },

        }
    }
</script>

<style scoped>

</style>
