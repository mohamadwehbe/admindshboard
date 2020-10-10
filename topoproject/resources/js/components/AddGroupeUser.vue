<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add User</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">User</label>

                            <div class="col-md-6">
                                <select v-model="user_id" id="name" >
                                    <option v-for="user in users" :value="user.id">{{user.email}}</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" @click="adduser()">
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
    mounted() {
        let that = this;
        that.groupe_id=that.$route.params.groupe_id;
        axios.get('/api/users',{headers : {

            }}).then(function (response){
            // console.log(response.data);
            that.users=response.data;
        })
    },
    data:function (){
        return {
            users:[],
            user_id:undefined,
            groupe_id:undefined
        }
    },
    methods:{
        adduser(){
            let that=this;
            axios.post('/api/addgroupeuser',{
                groupe_id:that.groupe_id,
                user_id:that.user_id
            }).then(function (response){
                that.$router.push('/admin/groupes');
            });
        }
    }

}
</script>

<style scoped>

</style>
