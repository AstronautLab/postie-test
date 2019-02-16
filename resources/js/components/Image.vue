<template>
    <div>
        <h1 v-if="image">Link: {{image.link}}</h1>
        <h2 v-if="image">Points: {{ image.points }}</h2>
    </div>
</template>
<script>
    export default {
        name: 'Image',
        data() {
            return {
                image: null
            }
        },
        created() {
            this.fetchImage()
        },
        methods: {
            fetchImage() {
                this.$http.get('images/' + this.$route.params.id)
                    .then((req) => {
                        this.image = req.data
                    })
                    .catch(() => {
                        alert('Failed fetching the Image')
                    })
            },
            getImage(image) {
                return 'storage/' + image.path;
            }
        }
    }
</script>