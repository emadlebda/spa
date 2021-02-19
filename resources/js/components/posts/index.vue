<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Body</th>
                <th>Created date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="post in posts.data">
                <td>{{ post.title }}</td>
                <td>{{ post.post_text.substring(0, 50) }}</td>
                <td>{{ post.created_at }}</td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <pagination :data="posts" @pagination-change-page="getResults"></pagination>

    </div>

</template>
<script>
export default {
    data() {
        return {
            posts: {},
        };
    },
    mounted() {
        this.getResults();
    },
    methods: {
        getResults(page = 1) {
            axios.get('/api/posts?page=' + page)
                .then(response => {
                    this.posts = response.data;
                });
        }
    }
};
</script>
