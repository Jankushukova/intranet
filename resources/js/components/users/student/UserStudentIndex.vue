<template>
    <div class="card-body ">
        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexUser'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>User</th>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user, index in users">
                    <td class="py-1">
                        <button class="btn btn-rounded btn-icon bg-bitlab text-light">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </button>
                    </td>
                    <td>
                        {{user.first_name}} {{user.last_name}}
                    </td>
                    <td>
                        {{user.email}}

                    </td>
                    <td>
                        {{user.phone_number}}
                    </td>
                    <td>
                        <router-link tag="button" class="btn btn-icon"
                                     :to="{name: 'editUser', params: {user_id: user.id}}">
                            <i class="mdi mdi-border-color"></i>
                        </router-link>

                        <button class="btn btn-icon">
                            <i class="mdi mdi-delete" v-on:click="deleteEntry(user.id, index)"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
    import userService from '../../../services/user.service';

    export default {
        data: function () {
            return {
                users: []
            }
        },
        mounted: function () {
            let app = this;
            userService.getStudents()
                .then(function (resp) {
                    app.users = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    bootbox.alert("Could not load students");
                });
        },
        methods: {
            deleteEntry(id, index) {
                var app = this;
                bootbox.confirm("Do you really want to delete it?", function (result) {
                    if (result) {
                        axios.delete('/api/v1/users/' + id)
                            .then(function (resp) {
                                app.users.splice(index, 1);
                            })
                            .catch(function (resp) {
                                bootbox.alert("Could not delete user");
                            });
                    }
                });
            },
        }
    }
</script>


<style scoped>

    a:hover {
        color: white;
    }

</style>
