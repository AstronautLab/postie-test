<template>
    <div>
        <h1>Users:</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Total Points</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users">
                <td>{{ user.id }}</td>
                <td><router-link :to="{ name: 'UserImages', params: { username: user.username } }">{{ user.username
                    }}</router-link></td>
                <td>{{ user.total_points }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        name: 'Dashboard',
        data() {
            return {
                users: []
            }
        },
        created() {
            this.fetchUsers()
        },
        methods: {
            fetchUsers() {
                this.$http.get(`users`)
                    .then((req) => {
                        this.users = req.data
                    }).catch(() => {
                    alert('Failed fetching Users')
                })
            }
        }
    }
</script>