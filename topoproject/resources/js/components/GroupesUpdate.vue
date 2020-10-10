<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Groupe</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">GName</label>

                            <div class="col-md-6">
                                <input v-model="gname" id="name" type="text" class="form-control" >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" @click="Gupdate()">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        let that = this;
        this.groupe_id=this.$route.params.groupe_id;
        axios.get('/api/getgroupe/'+this.groupe_id,{headers : {

            }}).then(function (response){
            let groupe=response.data;
            that.gname=groupe.name;
        })

    },
    data: function (){
        return {
            groupe_id:undefined,
            gname:''
        }
    },
    methods: {
        Gupdate(){
            let that=this;
            axios.put('/api/gupdate',{
                'id':that.groupe_id,
                'name':that.gname
            }).then(function (response){

                that.$router.push('/admin/groupes');
            });
        }
    }
}
</script>

<style scoped>

</style>
