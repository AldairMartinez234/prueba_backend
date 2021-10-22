<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Registar nuevo empleado</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                             <div class="col-6 mb-2">
                                <div class="form-group">
                                    <label>Codigo</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="nomina.code"
                                    />
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="nomina.name"
                                    />
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <div class="form-group">
                                    <label>Apellido Materno</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="nomina.second_last_name"
                                    />
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <div class="form-group">
                                    <label>Apellido Paterno</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="nomina.first_last_name"
                                    />
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="nomina.email"
                                    />
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <div class="form-group">
                                    <label>Tipo de contrato</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="nomina.contract_type"
                                    />
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <div class="form-group">
                                     <label>Estatus</label>
                                    <select
                                        class="form-select"
                                        aria-label="Default select example"
                                         v-model="nomina.status"
                                    >
                                        <option value='' selected disabled>Estatus</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <br>
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "add-nomina",
    data() {
        return {
            nomina: {
                code: "",
                name: "",
                second_last_name: "",
                first_last_name: "",
                email: "",
                contract_type: "",
                status: ""
            },
        };
    },
    methods: {
        async create() {
            await this.axios
                .post("/api/nominas", this.nomina)
                .then((response) => {
                    this.$router.push({ name: "nominaList" });
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
