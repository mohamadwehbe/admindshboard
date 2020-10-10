<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr v-for="(user,index) in users">
                                <th scope="row">{{user.id}}</th>
                                <td>{{user.name}}</td>
                                <td>{{user.email}}</td>
                                <td>

                                        <button type="button" class="btn btn-primary float-left" @click="$router.push('usersupdate/'+user.id)">Edit</button>

                                        <button type="button" class="btn btn-warning float-left" v-on:click="DeleteUser(user.id,index)">Delete</button>
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
    mounted() {
        let that = this;
        axios.get('/api/users',{headers : {

            }}).then(function (response){
               // console.log(response.data);
            that.users=response.data;
        })
    },
    data: function (){
        return {
            users:[]
        }
    },
    methods: {
      DeleteUser(id,index){
          let that=this;
        axios.delete('/api/deleteuser/'+id).then(function (){
            that.users.splice(index,1);
        });
      }
    }
}
</script>

<style>

</style>
