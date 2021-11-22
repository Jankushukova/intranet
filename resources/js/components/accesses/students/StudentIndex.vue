<template>
    <div class="card-body ">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexAccess'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>
            <div class="col">Create student access</div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Course</th>
                    <th>Title</th>
                    <th>Ready</th>
                    <th>Accesses</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="course, index in courses">
                    <td class="py-1">
                        <button class="btn btn-rounded btn-icon bg-bitlab text-light">
                            <i class="fal fa-book-open"></i>
                        </button>
                    </td>
                    <td>
                        {{course.title}}
                    </td>
                    <td>
                        <span v-if="course.ready" class="text-success">
                                    <i class="fa fa-thumbs-up fa-lg"></i> готов
                        </span>
                        <span v-else class="text-danger">
                                    <i class="mdi mdi-alert"></i>
                            Еще не готов
                        </span>
                    </td>
                    <td>
                        <a class="btn btn-outline-dark " v-on:click="openModal(course)">
                            <i class="fal fa-lock fa-2x"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <student-access-modal></student-access-modal>
    </div>

</template>

<script>

    import StudentAccessModal from "./StudentAccessModal";
    export default {
        components: {StudentAccessModal},
        data: function () {
            return {
                courses: [],
            }
        },

        mounted: function () {
            let app = this;
            axios.get('/api/v1/courses')
                .then(function (resp) {
                    app.courses = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    bootbox.alert("Could not load courses");
                });
        },
        methods: {
            openModal: function (course) {
                this.$emit('sendCourse', course);
            }
        }
    }
</script>