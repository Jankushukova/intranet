<template>
    <div class="card-body">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexGroupStudents', params: {group_id: groupId}}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>


        </div>
        <div class="form-group">
                <label>Select student:</label>
                <select v-model="selectedStudent" class="form-control">
                    <option v-for="student in students" :value="student.id">{{student.first_name}} {{student.last_name}}</option>
                </select>
        </div>
        <div class="form-group text-right">
            <button  v-on:click="saveForm" class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-check"></i>
            </button>
        </div>



    </div>
</template>

<script>
    import ToastrService from "../../../services/toastr.service";

    export default {
        mounted() {
            var app = this;
            app.group_users.group_id = app.$route.params.group_id;
            app.groupId = app.group_users.group_id;
            axios.get('/api/v1/users/students')
                .then(function (resp) {
                    app.students = resp.data;
                })
                .catch(function () {
                    bootbox.alert("Could not load students");

                });
        },
        data: function () {
            return {
                group_users: {
                    student_id:null,
                    group_id:null,
                },
                groupId:{},
                students:[],
                selectedStudent:null,
            }
        },
        methods: {
            saveForm() {
                var app = this;

                bootbox.confirm("Do you really want to add this student to group?", function(result){
                    if(result){

                        event.preventDefault();
                        app.group_users.student_id = app.selectedStudent;

                        var newGroupStudent = app.group_users;
                        axios.post('/api/v1/groupsStudents', newGroupStudent)
                            .then(function (resp) {
                                app.$router.push({name: 'indexGroupStudents', params: {group_id: app.groupId}});
                                ToastrService.showSaved();
                            })
                            .catch(function (resp) {
                                console.log(resp);
                                bootbox.alert("Could not add student to this group");

                            });
                    }
                });

            }
        }
    }
</script>

<style scoped>

</style>
