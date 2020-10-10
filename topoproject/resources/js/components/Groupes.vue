<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Groupes</div>

                    <div class="card-body">
                        <button type="button" class="btn btn-primary" @click="$router.push('/admin/addgroupe')">Add Groupe</button>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Users</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr v-for="(groupe,index) in groupes">
                                <th scope="row">{{groupe.id}}</th>
                                <td>{{groupe.name}}</td>
                                <td>{{getUsersNames(groupe)}}</td>
                                <td>

                                    <button type="button" class="btn btn-primary float-left" @click="$router.push('addgroupeuser/'+groupe.id)">AddUser</button>
                                    <button type="button" class="btn btn-primary float-left " @click="$router.push('groupesupdate/'+groupe.id)">Edit</button>
                                    <button type="submit" class="btn btn-warning float-left" v-on:click="DeleteGroupe(groupe.id,index)">Delete</button>
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
        axios.get('/api/groupes',{headers : {

            }}).then(function (response){
             console.log(response.data);
            that.groupes=response.data;
        })
    },
    data: function (){
        return {
            groupes:[]
        }
    },
    methods: {
        DeleteGroupe(id,index){
            let that=this;
            axios.delete('/api/deletegroupe/'+id).then(function (){
                that.groupes.splice(index,1);
            });
        },
        getUsersNames(groupe){
            let names='';

            for(let index in groupe.users){
                    let user=groupe.users[index];
                names+=user.name+' ';
            }
            return names;
        }
    }
}
</script>

<style>

</style>
