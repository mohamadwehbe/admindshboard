<template>
    <div><table class="table"> <tr><h2>Dashboard</h2></tr>
        <tr><router-link to="/admin/users">Users</router-link></tr>
        <tr><router-link to="/admin/groupes">groupes</router-link></tr></table>
        <router-view></router-view>
    </div>
</template>
<script>
    export default {
    }
</script>
