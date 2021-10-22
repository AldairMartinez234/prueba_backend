<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update nominas</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                             <div class="col-6 mb-2">
                                <div class="form-group">
                                    <label>Codigo</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="nominas.code"
                                    />
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="nominas.name"
                                    />
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <div class="form-group">
                                    <label>Apellido Materno</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="nominas.second_last_name"
                                    />
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <div class="form-group">
                                    <label>Apellido Paterno</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="nominas.first_last_name"
                                    />
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="nominas.email"
                                    />
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <div class="form-group">
                                    <label>Tipo de contrato</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="nominas.contract_type"
                                    />
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <div class="form-group">
                                     <label>Estatus</label>
                                    <select
                                        class="form-select"
                                        aria-label="Default select example"
                                         v-model="nominas.status"
                                    >
                                        <option value='' selected disabled>Estatus</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <br>
                                <button type="submit" class="btn btn-primary">Update</button>
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
    name:"update-nominas",
    data(){
        return {
            nominas:{
                code: "",
                name: "",
                second_last_name: "",
                first_last_name: "",
                email: "",
                contract_type: "",
                status: "",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.shownominas()
    },
    methods:{
        async shownominas(){
            await this.axios.get(`/api/nominas/${this.$route.params.id}`).then(response=>{
                const { code,name,second_last_name,first_last_name,email,contract_type,status } = response.data
                this.nominas.code = code,
                this.nominas.name = name,
                this.nominas.second_last_name = second_last_name,
                this.nominas.first_last_name = first_last_name,
                this.nominas.email = email,
                this.nominas.contract_type = contract_type,
                this.nominas.status = status
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/nominas/${this.$route.params.id}`,this.nominas).then(response=>{
                this.$router.push({name:"nominaList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>
