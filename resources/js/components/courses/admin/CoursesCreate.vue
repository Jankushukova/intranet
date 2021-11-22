<template>
    <div class="card-body">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexCourse'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>

            <div class="col">Create new course</div>
        </div>


        <div class="form-group">
            <label>Course title</label>
            <input type="text" class="form-control form-control-lg" placeholder="Title" aria-label="Title..."
                   v-model="course.title">
        </div>
        <div class="form-group">
            <label>Course description</label>
            <textarea style="height: 200px" class="form-control" placeholder="Description..." aria-label="Description"
                      v-model="course.description"></textarea>
        </div>

        <div class="form-check form-check-flat form-check-primary">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" v-model="course.ready">
                Ready
                <i class="input-helper"></i></label>
        </div>
        <div class="form-group text-right">
            <button  v-on:click="saveForm" class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-check"></i>
            </button>
        </div>
    </div>
</template>

<script>
    import ToastrService from '../../../services/toastr.service';

    export default {

        data: function () {
            return {
                course: {
                    title: '',
                    description: '',
                    ready: false
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newCourse = app.course;
                axios.post('/api/v1/courses', newCourse)
                    .then(function (resp) {
                        app.$router.push({name: 'indexCourse'});
                        ToastrService.showSaved();
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        bootbox.alert("Could not create your course");

                    });
            }
        }
    }
</script>
