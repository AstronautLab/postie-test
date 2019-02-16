<template>
    <div>
        <h2>Images</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Path</th>
                <th scope="col">Likes</th>
                <th scope="col">Comments</th>
                <th scope="col">Open</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="image in images">
                <td>{{ image.id }}</td>
                <td>{{ image.path }}</td>
                <td>{{ image.likes }}</td>
                <td>{{ image.comments }}</td>
                <td><router-link :to="{ name: 'Image', params: { id: image.id, username: $route.params.username } }">Open</router-link></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        name: 'UserImages',
        data() {
            return {
                images: []
            }
        },
        created() {
            this.fetchUserImages()
        },
        methods: {
            fetchUserImages() {
                this.$http.get('images/' + this.$route.params.username)
                    .then((req) => {
                        this.images = req.data
                    })
                    .catch(() => {
                        alert('Failed fetching the Images')
                    })
            }
        }
    }
</script>