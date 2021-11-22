<template>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" id="accessModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{user.first_name + ' ' + user.last_name}}
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
                        <tr v-for="(course, index) in filteredList">
                            <td>
                                <p v-text="course.title"></p>
                            </td>
                            <td class="text-right"><a v-on:click="addCourse(course)"><i
                                    class="text-success mr-2 fa fa-plus-circle fa-2x"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="my-1 p-3 bg-white rounded shadow-sm border-top border-dark">
                        <h3>Открытые доступы</h3>

                        <div class="media text-muted pt-3" v-for="(course, index) in courses">
                            <div class="media-body p-2 small lh-125 border ">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <strong class="text-gray-dark" v-text="course.title"></strong>
                                    <a v-on:click="removeCourse(course)"> <i
                                            class="fa fa-minus-circle text-danger fa-2x"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div v-if="courses.length == 0" class="media text-muted pt-3">
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
        name: "TeacherAccessModal",
        data: function () {
            return {
                user: {},
                courses: [],
                otherCourses: [],
                searchStr: ''
            }
        },
        mounted: function () {
        },
        methods: {
            showModal(user) {
                this.user = user;
                let app = this;

                axios.all([
                    axios.get('/api/v1/teacher/access/courses/' + this.user.id),
                    axios.get('/api/v1/teacher/access/except/courses/' + this.user.id)
                ])
                    .then(axios.spread(function (coursesResp, otherCoursesResp) {

                        app.courses = coursesResp.data;
                        app.otherCourses = otherCoursesResp.data;
                        $('#accessModal').modal('show');
                    }));

            },
            closeModal() {
                this.user = {};
                this.searchStr = '';
                this.courses = [];
                $('#accessModal').modal('hide');
            },
            removeCourse(course) {
                this.courses = this.courses.filter(e => e.id !== course.id);
                this.otherCourses.push(course);
            },

            addCourse(course) {
                this.courses.push(course);
                this.otherCourses = this.otherCourses.filter(e => e.id !== course.id);
            },

            saveAll() {
                axios.post('/api/v1/teacher/access/courses/save', null, {
                    params: {
                        user_id: this.user.id,
                        course_ids: this.courses.length ? this.courses.map(e => e.id) : []
                    }
                }).then(e => {
                    this.closeModal();
                    ToastrService.showSaved();
                }).catch(err => {
                    bootbox.alert("Could not save");
                });
            }

        },
        created: function () {
            this.$parent.$on('sendUser', this.showModal);
        },
        computed: {

            filteredList() {
                return this.otherCourses.filter(e => e.title.toLowerCase().includes(this.searchStr.toLowerCase()) || !this.searchStr.trim())
            }
        }
    }
</script>

<style scoped>

</style>