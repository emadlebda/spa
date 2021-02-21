<template>
    <div>
        <form @submit.prevent="submit_form">
            Post title:
            <br/>
            <input v-model="fields.title" class="form-control" type="text"/>
            <div v-if="errors && errors.title" class="alert alert-danger">
                {{errors.title[0]}}
            </div>
            <br/>
            Post text:
            <br/>
            <textarea v-model="fields.post_text" class="form-control" rows="10"></textarea>
            <div v-if="errors && errors.post_text" class="alert alert-danger">
                {{errors.post_text[0]}}
            </div>
            <br/>
            Category:
            <select v-model="fields.category_id" class="form-control">
                <option v-for="category in categories"
                        :value="category.id">{{ category.name }}
                </option>
            </select>
            <div v-if="errors && errors.category_id" class="alert alert-danger">
                {{errors.category_id[0]}}
            </div>
            <br/>
            <input class="btn btn-primary" type="submit" value="Save post"/>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            categories: {},
            fields: {
                title: '',
                post_text: '',
                category_id: ''
            },
            errors: {},
        };
    },
    mounted() {
        axios.get('api/categories')
            .then(response => {
                this.categories = response.data.data;
            });
    },
    methods: {
        submit_form() {
            axios.post('api/posts', this.fields)
                .then(response => {
                    this.$router.push('/');
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }

                });
        }
    }
};
</script>
