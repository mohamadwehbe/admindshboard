<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User </div>

                    <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">UName</label>

                                <div class="col-md-6">
                                    <input v-model="uname" id="name" type="text" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input v-model="email" id="email" type="email" class="form-control " name="email" >

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" @click="Uupdate()">
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
            this.user_id=this.$route.params.user_id;
            axios.get('/api/getuser/'+this.user_id,{headers : {

                }}).then(function (response){
                    let user=response.data;
                    that.uname=user.name;
                    that.email=user.email;
            })

        },
        data: function (){
            return {
                user_id:undefined,
                uname:'',
                email:''
            }
        },
        methods: {
            Uupdate(){
                let that=this;
                axios.put('/api/uupdate',{
                    'id':that.user_id,
                    'name':that.uname,
                    'email':that.email
                }).then(function (response){

                    that.$router.push('/admin/users');
                });
            }
        }
}
</script>

<style scoped>

</style>
