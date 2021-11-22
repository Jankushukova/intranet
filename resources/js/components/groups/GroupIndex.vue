<template>
    <div class="card-body ">

        <div class="card-description row">
            <button class="btn btn-outline-secondary btn-rounded btn-icon " @click="openModal">
                <i class="mdi mdi-plus"></i>
            </button>

        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card" v-for="group, index in groups">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{group.name}}</h4>
                        <div class="card-description">
                            <router-link tag="button" :to="{name: 'indexGroupStudents', params: {group_id: group.id}}"
                                         type="button"
                                         class="btn  btn-outline-light btn-rounded btn-icon bg-bitlab">
                                <i class="fas fa-users-class"></i>

                            </router-link>

                            <router-link tag="button" :to="{name: 'indexGroupTeachers', params: {group_id: group.id}}"
                                         type="button"
                                         class="btn  btn-outline-light btn-rounded btn-icon bg-bitlab">
                                <i class="fas fa-chalkboard-teacher "></i>
                            </router-link>
                        </div>


                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">

                            </div>
                            <div class="col-lg-6">
                                <p class="text-right">
                                    <button class="btn btn-icon">
                                        <i class="mdi mdi-delete" v-on:click="deleteEntry(group.id, index)"></i>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <group-create @saveGroup="addToGroups"></group-create>
    </div>
</template>

<script>

    import GroupCreate from "./GroupCreate";

    export default {
        name: "course-view",
        components: {GroupCreate},
        data: function () {
            return {
                groups: [],
            }
        },
        mounted() {
            let app = this;
            axios.get('/api/v1/groups')
                .then(function (resp) {
                    app.groups = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    bootbox.alert("Невозможно получить группы");

                });
        },
        methods: {
            deleteEntry(id, index) {
                var app = this;
                bootbox.confirm("Вы  точно хотите удалить?", function (result) {
                    if (result) {
                        axios.delete('/api/v1/groups/' + id)
                            .then(function (resp) {
                                app.groups.splice(index, 1);
                            })
                            .catch(function (resp) {
                                bootbox.alert("Невозможно удалить группу!");
                            });
                    }
                });
            },
            openModal: function () {
                $('#groupCreationModal').modal('show');
            },
            addToGroups(group) {
                var app = this;
                app.groups.push(group);
            }

        }
    }
</script>
