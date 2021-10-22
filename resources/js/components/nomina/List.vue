<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"nominaAdd"}' class="btn btn-primary">Crear nuevo empleado</router-link>
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
                                <tr v-for="(nomina,key) in nominas" :key="key">
                                    <td>{{ nomina.id }}</td>
                                    <td>{{ nomina.code }}</td>
                                    <td>{{ nomina.name  }} {{ nomina.first_last_name  }} {{ nomina.second_last_name  }}</td>
                                    <td>{{ nomina.email }}</td>
                                    <td>{{ nomina.contract_type }}</td>
                                    <td v-if="nomina.status == 1">Activo</td>
                                    <td v-if="nomina.status == 0">Inativo</td>
                                    <td>
                                        <router-link :to='{name:"nominaShow",params:{id:nomina.id}}' class="btn btn-primary">Detalle</router-link>
                                        <router-link :to='{name:"nominaEdit",params:{id:nomina.id}}' class="btn btn-success">Editar</router-link>
                                        <button type="button" @click="deletenomina(nomina.id)" class="btn btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="7" align="center">No hay empleados registrados.</td>
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
    name:"nominas",
    data(){
        return {
            nominas:[]
        }
    },
    mounted(){
        this.getnominas()
    },
    methods:{
        async getnominas(){
            await this.axios.get('/api/nominas').then(response=>{
                this.nominas = response.data
            }).catch(error=>{
                console.log(error)
                this.nominas = []
            })
        },
        deletenomina(id){
            if(confirm("Are you sure to delete this nomina ?")){
                this.axios.delete(`/api/nominas/${id}`).then(response=>{
                    this.getnominas()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>
