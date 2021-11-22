<template>
    <div class="card-body ">

        <div class="card-description row">

            <router-link tag="button" :to="{name: 'indexLesson', params: {course_id: courseId}}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon mr-2">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>

            <router-link tag="button" :to="{name: 'createMaterial', params: {lesson_id: lessonId}}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-plus"></i>
            </router-link>

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
                            <router-link tag="button" :to="{name: 'editMaterial', params: {material_id:material.id}}" type="button"
                                         class="btn  btn-outline-light btn-rounded btn-icon bg-bitlab">
                                <i class="fas fa-eye"></i>
                            </router-link>
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                                <span  class="mdi mdi-pound " >
                                    {{material.material_order}}
                                </span>

                            </div>
                            <div class="col-lg-6">
                                <p class="text-right">
                                    <router-link tag="button" class="btn btn-icon" :to="{name: 'editMaterial', params: {material_id: material.id,lesson_id:lessonId,course_id:courseId}}">
                                        <i class="mdi mdi-border-color "></i>
                                    </router-link>

                                    <button class="btn btn-icon">
                                        <i class="mdi mdi-delete " v-on:click="deleteEntry(material.id, index)"></i>
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
        data: function () {
            return {
                materials: [],
                lessonId:{},
                courseId:{},
            }
        },
        mounted() {
            let app = this;
            app.lessonId = app.$route.params.lesson_id;

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
                    app.courseId = (resp.data).course_id;
                })
                .catch(function (resp) {
                    console.log(resp);
                    bootbox.alert("Could not load lesson");

                });
        },
        methods: {
            deleteEntry(id, index) {
                var app = this;
                bootbox.confirm("Do you really want to delete it?", function(result){
                    if(result){
                        axios.delete('/api/v1/materials/' + id)
                            .then(function (resp) {
                                app.materials.splice(index, 1);
                            })
                            .catch(function (resp) {
                                bootbox.alert("Could not delete material");
                            });
                    }
                });
            },

        }
    }
</script>

<style scoped>

</style>
