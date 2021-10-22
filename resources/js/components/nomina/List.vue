<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to="{ name: 'nominaAdd' }" class="btn btn-primary"
                >Crear nuevo empleado</router-link
            >
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Empleados</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Tipo de contrato</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody v-if="nominas.length > 0">
                                <tr v-for="(nomina, key) in nominas" :key="key">
                                    <td>{{ nomina.id }}</td>
                                    <td>{{ nomina.code }}</td>
                                    <td>
                                        {{ nomina.name }}
                                        {{ nomina.first_last_name }}
                                        {{ nomina.second_last_name }}
                                    </td>
                                    <td>{{ nomina.email }}</td>
                                    <td>{{ nomina.contract_type }}</td>
                                    <td v-if="nomina.status == 1">Activo</td>
                                    <td v-if="nomina.status == 0">Inativo</td>
                                    <td>
                                        <router-link
                                            :to="{
                                                name: 'nominaShow',
                                                params: { id: nomina.id }
                                            }"
                                            class="btn btn-primary"
                                            >Detalle</router-link
                                        >
                                        <router-link
                                            :to="{
                                                name: 'nominaEdit',
                                                params: { id: nomina.id }
                                            }"
                                            class="btn btn-success"
                                            >Editar</router-link
                                        >
                                        <button
                                            type="button"
                                            @click="deletenomina(nomina.id,nomina.name,nomina.second_last_name,nomina.first_last_name)"
                                            class="btn btn-danger"
                                        >
                                            Eliminar
                                        </button>
                                         <button
                                            v-if="nomina.status == 0"
                                            type="button"
                                            @click="statusnomina(nomina.id,nomina.status,nomina.name,nomina.second_last_name,nomina.first_last_name)"
                                            class="btn btn-success"
                                        >
                                            Activar
                                        </button>
                                         <button
                                            v-if="nomina.status == 1"
                                            type="button"
                                            @click="statusnomina(nomina.id,nomina.status,nomina.name,nomina.second_last_name,nomina.first_last_name)"
                                            class="btn btn-warning"
                                        >
                                            Desactivar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="7" align="center">
                                        No hay empleados registrados.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "nominas",
    data() {
        return {
            nominas: []
        };
    },
    mounted() {
        this.getnominas();
    },
    methods: {
        async getnominas() {
            await this.axios
                .get("/api/nominas")
                .then(response => {
                    this.nominas = response.data;
                })
                .catch(error => {
                    console.log(error);
                    this.nominas = [];
                });
        },
        deletenomina(id,name,second_last_name,first_last_name) {
            this.$swal
                .fire({
                    title:
                        "¿Estas seguro  que quiere eliminar al empleado " +
                        name + ' ' + first_last_name + ' ' +second_last_name + "?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Eliminar"
                })
                .then(result => {
                    if (result.isConfirmed) {
                        this.$swal.fire(
                            "Eliminado",
                            "El empleado fue eliminado con exito",
                            "success"
                        );

                        this.axios
                            .delete("/api/nominas/" + id)
                            .then(response => {
                                this.getnominas();
                            })
                            .catch(error => {
                                console.log(error);
                            });
                    }
                });
        },

        statusnomina(id,status,name,second_last_name,first_last_name) {
            this.$swal
                .fire({
                    title:
                        "¿Desea cambiar el estatus del empelado " +
                        name + ' ' + first_last_name + ' ' +second_last_name + "?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Cambiar"
                })
                .then(result => {
                    if (result.isConfirmed) {
                        this.$swal.fire(
                            "Estatus actualizado",
                            "",
                            "success"
                        );

                        this.axios
                            .put("/api/nominas/status/" + id + '/' + status) //cambiar estatus
                            .then(response => {
                                this.getnominas();
                            })
                            .catch(error => {
                                console.log(error);
                            });
                    }
                });
        }
    }
};
</script>
