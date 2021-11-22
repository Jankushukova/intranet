<template>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" id="accessModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{course.title}}
                        доступы</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input v-model="searchStr" class="form-control" type="search" placeholder="Поиск"
                               aria-label="Search">
                    </form>
                    <table class="table">
                        <thead class="thead-light">
                        <th>Курсы не открытые в доступах</th>
                        <th>Действия</th>
                        </thead>
                        <tbody>
                        <tr v-for="(user, index) in filteredList">
                            <td>
                                <p v-text="user.first_name +' ' + user.last_name"></p>
                            </td>
                            <td class="text-right"><a v-on:click="addUser(user)"><i
                                    class="text-success mr-2 fa fa-plus-circle fa-2x"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="my-1 p-3 bg-white rounded shadow-sm border-top border-dark">
                        <h3>Открытые доступы</h3>

                        <div class="media text-muted pt-3" v-for="(user, index) in courseUsers">
                            <div class="media-body p-2 small lh-125 border ">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <strong class="text-gray-dark"
                                            v-text="user.first_name + ' '  + user.last_name"></strong>
                                    <a v-on:click="removeUser(user)"> <i
                                    class="fa fa-minus-circle text-danger fa-2x"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div v-if="courseUsers.length == 0" class="media text-muted pt-3">
                            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <div class="w-100">
                                    <p class="text-center text-danger">Нет данных <i class="fa fa-question"></i></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="closeModal()">Закрыть</button>
                    <button type="button" class="btn btn-primary" v-on:click="saveAll()">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ToastrService from '../../../services/toastr.service';
    export default {
        name: "StudentAccessModal",
        data: function () {
            return {
                course: {},
                courseUsers: [],
                otherUsers: [],
                searchStr: ''
            }
        },
        created: function () {
            this.$parent.$on('sendCourse', this.showModal);
        },
        methods: {
            showModal(course) {
                this.course = course;
                let app = this;
                axios.all([
                    axios.get('/api/v1/student/access/courses/' + app.course.id),
                    axios.get('/api/v1/student/access/except/courses/' + this.course.id)
                ])
                    .then(axios.spread(function (courseUsersResp, otherUsersResp) {

                        app.courseUsers = courseUsersResp.data;
                        app.otherUsers = otherUsersResp.data;
                        $('#accessModal').modal('show');
                    }));

            },

            removeUser(user) {
                this.courseUsers = this.courseUsers.filter(e => e.id !== user.id);
                this.otherUsers.push(user);
            },

            addUser(user) {
                this.courseUsers.push(user);
                this.otherUsers = this.otherUsers.filter(e => e.id !== user.id);
            },
            closeModal() {
                this.course = {};
                $('#accessModal').modal('hide');
            },
            saveAll() {
                axios.post('/api/v1/student/access/courses/save', null, {
                    params: {
                        course_id: this.course.id,
                        user_ids: this.courseUsers.length ? this.courseUsers.map(e => e.id) : []
                    }
                }).then(e => {
                    this.closeModal();
                    ToastrService.showSaved();
                }).catch(err => {
                    bootbox.alert("Could not save");
                });

            }
        },
        computed: {
            filteredList() {
                return this.otherUsers.filter(e =>
                    e.first_name.toLowerCase().includes(this.searchStr.toLowerCase())
                    || e.last_name.toLowerCase().includes(this.searchStr.toLowerCase())
                    || !this.searchStr.trim()
                )
            }
        }
    }
</script>

<style scoped>

</style>