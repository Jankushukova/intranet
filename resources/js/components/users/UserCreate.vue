<template>
    <div class="card-body">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexUser'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>

            <div class="col">Create new user</div>
        </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
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
                        <input type="email" class="form-control form-control-lg" required placeholder="Введите email"
                               v-model="user.email">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">

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

                    <div class="form-group">
                        <label>Роль</label>
                        <select class="form-control" name="role" v-model="user.role_id">
                            <option value="2">Учитель</option>
                            <option value="3">Студент</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group text-right">
            <button v-on:click="saveForm" class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-check"></i>
            </button>
        </div>
    </div>
</template>

<script>
    import ToastrService from "../../services/toastr.service";
    import userService from '../../services/user.service';

    export default {
        data: function () {
            return {
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
            saveForm() {
                event.preventDefault();
                var app = this;
                var newUser = null;
                if (this.pass === this.password_confirmation) {
                    app.user.password = app.pass;
                    newUser = app.user;
                }
                userService.save(newUser)
                    .then(function (resp) {
                        app.$router.push({name: 'indexUser'});
                        ToastrService.showSaved();
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        bootbox.alert("Ошибка при создании пользователя!");

                    });
            }
        }
    }
</script>

<style scoped>

</style>
