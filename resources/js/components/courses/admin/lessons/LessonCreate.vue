<template>
    <div class="card-body">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexLesson',params: {id:courseId}}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>
            <div class="col">Create new lesson</div>
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
        data: function () {
            return {
                lesson: {
                    title: '',
                    description: '',
                    lesson_order:'',
                    course_id:null,
                },
                courseId:{},

            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                app.courseId = app.$route.params.course_id;
                app.lesson.course_id = app.courseId;
                var newLesson = app.lesson;

                axios.post('/api/v1/lessons', newLesson)
                    .then(function (resp) {
                        app.$router.push({name:'indexLesson',params:{id:app.courseId}});
                        ToastrService.showSaved();
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        bootbox.alert("Could not create your lesson");

                    });
            }
        }
    }
</script>

<style scoped>

</style>
