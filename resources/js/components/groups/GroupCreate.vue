<template>

    <div class="modal fade bd-example-modal-xl" id="groupCreationModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Создать группу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Наименование группы</label>
                            <input type="text" class="form-control form-control-lg" aria-label="Title..."
                                   v-model="group.name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="closeModal()">Закрыть</button>
                    <button type="button" class="btn btn-primary" v-on:click="saveForm()">Сохранить</button>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import ToastrService from "../../services/toastr.service";

    export default {
        data: function () {
            return {
                group: {
                    name: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newGroup = app.group;
                axios.post('/api/v1/groups', newGroup)
                    .then(function (resp) {
                        app.$emit('saveGroup', resp.data);
                        ToastrService.showSaved();
                        app.group = {
                            name: '',
                        };
                        $('#groupCreationModal').modal('hide');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        bootbox.alert("Невозможно создать группу!");

                    });
            },
            closeModal() {
                app.group = {
                    name: '',
                };
                $('#groupCreationModal').modal('hide');
            }
        }
    }
</script>
