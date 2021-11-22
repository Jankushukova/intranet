<template>
    <div class="card-body ">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'createCourse'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon ">
                <i class="mdi mdi-plus"></i>
            </router-link>

        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card" v-for="course, index in courses">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{course.title}}</h4>
                        <p class="card-description">
                            {{course.description}}
                        </p>

                        <p class="text-right">
                            <router-link tag="button" :to="{name: 'indexLesson', params: {course_id: course.id}}" type="button"
                                         class="btn  btn-outline-light btn-rounded btn-icon bg-bitlab">
                                <i class="fab fa-readme "></i>
                            </router-link>
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="row" >
                            <div class="col-lg-6">
                                <span v-if="course.ready" class="text-success">
                                    <i class="fa fa-thumbs-up fa-lg"></i> готов
                                </span>
                                <span v-else class="text-danger">
                                    <i class="mdi mdi-alert"></i> Еще не готов
                                </span>
                            </div>
                            <div class="col-lg-6">
                                <p class="text-right">
                                    <router-link tag="button" class="btn btn-icon" :to="{name: 'editCourse', params: {id: course.id}}">
                                        <i class="mdi mdi-border-color"></i>
                                    </router-link>

                                    <button class="btn btn-icon">
                                        <i class="mdi mdi-delete" v-on:click="deleteEntry(course.id, index)"></i>
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
    import ToastrService from '../../../services/toastr.service';

    export default {
        name: "course-view",
        data: function () {
            return {
                id: null,
                courses: [],




            }
        },
        mounted() {
            let app = this;
            axios.get('/api/v1/courses')
                .then(function (resp) {
                    app.courses = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    bootbox.alert("Could not load course");
                });

        },
        methods: {
            deleteEntry(id, index) {
                var app = this;
                bootbox.confirm("Do you really want to delete it?", function(result){
                    if(result){
                        axios.delete('/api/v1/courses/' + id)
                            .then(function (resp) {
                                app.courses.splice(index, 1);
                                ToastrService.showDeleted();
                            })
                            .catch(function (resp) {
                                bootbox.alert("Could not delete course");
                            });
                    }
                });
            },

        }
    }
</script>
