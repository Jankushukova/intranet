<template>
    <div class="card-body ">
        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexAccess'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>

            <div class="col">Create teacher access</div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>User</th>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Accesses</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user, index in users">
                    <td class="py-1">
                        <button class="btn btn-rounded btn-icon bg-bitlab text-light">
                            <i class="fal fa-chalkboard-teacher"></i>
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
                        <a v-on:click="openModal(user)" class="btn btn-outline-dark ">
                            <i class="fal fa-lock fa-2x"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <teacher-access-modal></teacher-access-modal>
    </div>
</template>

<script>

    import TeacherAccessModal from "./TeacherAccessModal";

    export default {
        components: {TeacherAccessModal},
        data: function () {
            return {
                users: [],
            }
        },
        mounted: function () {
            let app = this;
            axios.get('/api/v1/users/teachers')
                .then(function (resp) {
                    app.users = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    bootbox.alert("Could not load teachers");
                });
        },
        methods: {
            openModal: function (user) {
                this.$emit('sendUser', user);
            }
        }
    }
</script>


<style scoped>

    a:hover {
        color: white;
    }

</style>
