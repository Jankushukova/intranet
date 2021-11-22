<template>
    <div class="card-body">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexGroup'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon mr-2">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>

            <router-link tag="button" :to="{name: 'createGroupTeachers', params: {group_id: groupId}}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-plus"></i>
            </router-link>
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card"  v-for="teacher, index in groups_teachers">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{teacher.first_name}} {{teacher.last_name}}</h4>
                        <p class="card-description">
                            {{teacher.phone_number}}
                            {{teacher.email}}

                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="text-right">
                                    <button class="btn btn-icon">
                                        <i class="mdi mdi-delete" v-on:click="deleteEntry(teacher.id, index)"></i>
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
            axios.get('/api/v1/groupsTeachers/' + id)
                .then(function (resp) {
                    app.groups_teachers = resp.data;
                })
                .catch(function () {
                    bootbox.alert("Could not load teachers of this group");

                });
        },
        data: function () {
            return {
                groupId: {},
                groups_teachers:[],
            }
        },


        methods: {
            deleteEntry(id, index) {
                var app = this;
                bootbox.confirm("Do you really want to delete it?", function(result){
                    if(result){
                        axios.delete('/api/v1/groupsTeachers/' + id)
                            .then(function (resp) {
                                app.groups_teachers.splice(index, 1);
                            })
                            .catch(function (resp) {
                                bootbox.alert("Could not delete teacher");
                            });
                    }
                });
            },


        }
    }
</script>

<style scoped>

</style>
