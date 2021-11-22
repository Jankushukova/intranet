<template>
    <div class="card-body ">

        <div class="card-description row">
            {{user.first_name}} {{user.last_name}}

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
                            <router-link tag="button" :to="{name: 'studentIndexLesson', params: {course_id: course.id}}" type="button"
                                         class="btn  btn-outline-light btn-rounded btn-icon bg-bitlab">
                                <i class="fab fa-readme "></i>
                            </router-link>
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="row" >

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

    export default {
        name: "course-view",
        data: function () {
            return {
                courses: [],
                user:{},
            }
        },
        mounted() {
            let app = this;
            axios.get('api/v1/users/current')
                .then(function (resp) {
                    app.user = resp.data;
                    axios.get('api/v1/student/access/users/' + app.user.id)
                        .then(function (resp) {
                            app.courses = resp.data;
                        })
                        .catch(function (resp) {
                            console.log(resp);
                            bootbox.alert("Could not load course");
                        });

                })
                .catch(function (resp) {
                    console.log(resp);
                    bootbox.alert("Could not load user");
                });



        },



    }
</script>
