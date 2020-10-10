<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Groupe</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">GName</label>

                            <div class="col-md-6">
                                <input v-model="gname" id="name" type="text" class="form-control" >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" @click="Gadd()">
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function (){
        return {
            gname:''
        }
    },
    methods: {
        Gadd(){
            let that=this;
            axios.post('/api/addgroupe',{
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
