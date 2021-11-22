<template>
    <div class="card-body">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexUser'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>

            <div class="col">
                <h5 class="text-muted">Изменение данных пользователя</h5>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <h3 class="text-muted">
                    Изменение персональных данных
                </h3>
                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" class="form-control form-control-lg" placeholder="Введите имя"
                           v-model="user.first_name">
                </div>
                <div class="form-group">
                    <label>Фамилия</label>
                    <input type="text" class="form-control form-control-lg" placeholder="Введите фамилие"
                           v-model="user.last_name">
                </div>
                <div class="form-group">
                    <label>Номер телефона</label>
                    <input type="text" class="form-control form-control-lg" placeholder="Введите номер телефона"
                           v-model="user.phone_number">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input readonly type="email" class="form-control form-control-lg" required
                           placeholder="Введите email"
                           v-model="user.email">
                </div>

                <div class="form-group">
                    <label>Роль</label>
                    <select class="form-control" name="role" v-model="user.role_id">
                        <option value="2">Учитель</option>
                        <option value="3">Студент</option>
                    </select>
                </div>


                <div class="form-group text-right">
                    <button v-on:click="editProfileForm()" class="btn btn-outline-bitlab btn-block">
                        <i class="mdi mdi-check"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <h3 class="text-muted">
                    Изменение пароля
                </h3>
                <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" class="form-control form-control-lg" placeholder="Введите пароль"
                           v-model="pass">
                </div>
                <div class="form-group">
                    <label>Подтверждение пароля</label>
                    <input type="password" class="form-control form-control-lg" placeholder="Подтвердите пароля"
                           v-model="password_confirmation">
                </div>

                <div class="form-group text-right">
                    <button v-on:click="editPasswordForm()" class="btn btn-outline-bitlab btn-block">
                        <i class="mdi mdi-check"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import ToastrService from "../../services/toastr.service";
    import userService from '../../services/user.service';

    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.user_id;
            app.userId = id;
            userService.getUserById(id)
                .then(function (resp) {
                    app.user = resp.data;
                })
                .catch(function () {
                    bootbox.alert("Не удалось найти пользователя!");

                });
        },
        data: function () {
            return {
                userId: {},
                user: {
                    first_name: '',
                    last_name: '',
                    phone_number: '',
                    email: '',
                    password: '',
                    role_id: '',
                    remember_token: '',

                },
                pass: '',
                password_confirmation: '',
            }
        },


        methods: {

            editProfileForm() {
                event.preventDefault();
                var app = this;
                var editingUser = app.user;
                userService.editProfile(app.userId, editingUser)
                    .then(function (resp) {
                        app.$router.push({name: 'indexUser'});
                        ToastrService.showEdited();
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        bootbox.alert("Произошли ошибки при обновлении персональных данных пользователя");

                    });
            },
            editPasswordForm() {
                event.preventDefault();
                var app = this;
                if (this.pass === this.password_confirmation) {

                    userService.changeUserPassword(
                        app.userId,
                        app.pass,
                        app.password_confirmation)
                        .then(function (resp) {
                            app.$router.push({name: 'indexUser'});
                            ToastrService.showEdited();
                        })
                        .catch(function (resp) {
                            console.log(resp);
                            bootbox.alert("Произошли ошибки при обновлении пароля пользователя");
                        });
                } else {
                    ToastrService.showToastr('Пароли не совпадают', 'error');
                    app.password_confirmation = '';
                    app.pass = '';
                }
            }
        }
    }
</script>

<style scoped>

</style>
