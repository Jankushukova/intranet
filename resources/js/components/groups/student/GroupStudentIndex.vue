<template>
    <div class="card-body">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexGroup'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon mr-2">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>

            <router-link tag="button" :to="{name: 'createGroupStudents', params: {group_id: groupId}}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-plus"></i>
            </router-link>
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card"  v-for="student, index in group_students">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{student.first_name}} {{student.last_name}}</h4>
                        <p class="card-description">
                            {{student.phone_number}}
                            {{student.email}}

                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="text-right">
                                    <button class="btn btn-icon">
                                        <i class="mdi mdi-delete" v-on:click="deleteEntry(student.id, index)"></i>
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
        mounted() {
            let app = this;
            let id = app.$route.params.group_id;
            app.groupId = id;
            axios.get('/api/v1/groupsStudents/' + id)
                .then(function (resp) {
                    app.group_students = resp.data;
                })
                .catch(function () {
                    bootbox.alert("Could not load students of this group");

                });
        },
        data: function () {
            return {
                groupId: {},
                group_students:[],
            }
        },


        methods: {
            deleteEntry(id, index) {
                var app = this;
                bootbox.confirm("Do you really want to delete it?", function(result){
                    if(result){
                        axios.delete('/api/v1/groupsStudents/' + id)
                            .then(function (resp) {
                                app.group_students.splice(index, 1);
                            })
                            .catch(function (resp) {
                                bootbox.alert("Could not delete student");
                            });
                    }
                });
            },


        }
    }
</script>

<style scoped>

</style>
