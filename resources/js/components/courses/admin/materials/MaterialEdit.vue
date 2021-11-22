<template>
    <div class="card-body">

        <div class="card-description">
            <router-link tag="button" :to="{name: 'indexMaterial', params: {lesson_id: lessonId}}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>

            <div class="col">Изменить материал</div>
        </div>
        <div class="form-group">
            <label>Тема</label>
            <input type="text" class="form-control form-control-lg" placeholder="Title" aria-label="Title..."
                   v-model="material.title">
        </div>
        <div class="form-group">
            <label>Контент</label>
            <textarea style="height: 200px" class="form-control" placeholder="Content..." aria-label="Description"
                      v-model="material.content"></textarea>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Очередность</label>
                        <input type="number" class="form-control " placeholder="Order" aria-label="Title..."
                               v-model="material.material_order">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Тип материала</label>
                        <select class="form-control" v-model="material.material_type_id">
                            <option v-for="(materialType, index) in materialTypes" v-bind:value="materialType.id"
                                    v-text="materialType.name"></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button v-on:click="saveForm" class="btn btn-outline-bitlab btn-block">
                <i class="mdi mdi-check"></i>
            </button>
        </div>


    </div>

</template>

<script>
    import ToastrService from "../../../../services/toastr.service";

    export default {
        mounted() {
            let app = this;
            app.material.id = app.$route.params.material_id;

            axios.all([
                axios.get('/api/v1/materialsShow/' + app.material.id),
                axios.get('/api/v1/material_types')
            ]).then(axios.spread(function (materials, materialTypeResp) {
                app.material = materials.data;
                app.lessonId = app.material.lesson_id;
                app.materialTypes = materialTypeResp.data;
            }))
                .catch(function () {
                    alert("Could not load your material")
                });

        },
        data: function () {
            return {
                material: {},
                lessonId: {},
                materialTypes: []
            }
        },


        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newMaterial = app.material;
                axios.patch('/api/v1/materials/' + app.material.id, newMaterial)
                    .then(function (resp) {
                        app.$router.push({name: 'indexMaterial', params: {lesson_id: app.lessonId}});
                        ToastrService.showEdited();
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        bootbox.alert("Could not edit your material");

                    });
            }
        }
    }
</script>

<style scoped>

</style>
