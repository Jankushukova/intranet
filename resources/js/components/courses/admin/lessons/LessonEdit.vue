<template>
    <div class="card-body">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexLesson',params: {course_id:courseId}}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>
            <div class="col">Edit lesson</div>
        </div>

        <div class="form-group">
            <label>Lesson title</label>
            <input type="text" class="form-control form-control-lg" placeholder="Title" aria-label="Title..."
                   v-model="lesson.title">
        </div>
        <div class="form-group">
            <label>Lesson description</label>
            <textarea style="height: 200px" class="form-control" placeholder="Description..." aria-label="Description"
                      v-model="lesson.description"></textarea>
        </div>

        <div class="form-group">
            <label>Lesson order</label>
            <input type="text" class="form-control form-control-lg" placeholder="Order..." aria-label="Title..."
                   v-model="lesson.lesson_order">
        </div>
        <div class="form-group text-right">
            <button  v-on:click="saveForm" class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-check"></i>
            </button>
        </div>


    </div>

</template>

<script>
    import ToastrService from "../../../../services/toastr.service";

    export default {
        mounted() {
            let app = this;
            app.lesson.id = app.$route.params.lesson_id;
            axios.get('/api/v1/lessonsShow/' + app.lesson.id)
                .then(function (resp) {
                    app.lesson = resp.data;
                    app.courseId = app.lesson.course_id;
                })
                .catch(function () {
                    alert("Could not load your lesson")
                });

        },
        data: function () {
            return {
                lesson:{

                },
                courseId:{}
            }
        },




        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newLesson = app.lesson;
                axios.patch('/api/v1/lessons/' + app.lesson.id, newLesson )
                    .then(function (resp) {
                        app.$router.push({name: 'indexLesson',params: {course_id:app.courseId}});
                        ToastrService.showEdited();
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        bootbox.alert("Could not edit your lesson");

                    });
            }
        }
    }
</script>

<style scoped>

</style>
