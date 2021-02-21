<template>
    <div>
        <form @submit.prevent="submit_form">
            Post title:
            <br/>
            <input v-model="fields.title" class="form-control" type="text"/>
            <div v-if="errors && errors.title" class="alert alert-danger">
                {{ errors.title[0] }}
            </div>
            <br/>
            Post text:
            <br/>
            <textarea v-model="fields.post_text" class="form-control" rows="10"></textarea>
            <div v-if="errors && errors.post_text" class="alert alert-danger">
                {{ errors.post_text[0] }}
            </div>
            <br/>
            Category:
            <select v-model="fields.category_id" class="form-control">
                <option v-for="category in categories"
                        :value="category.id">{{ category.name }}
                </option>
            </select>
            <div v-if="errors && errors.category_id" class="alert alert-danger">
                {{ errors.category_id[0] }}
            </div>
            <br/>
            Thumbnail:
            <br/>
            <input type="file" @change="select_file">
            <br/><br/>
            <input :disabled="form_submitting" :value="form_submitting ? 'Saving Post...' : 'Save Post'"
                   class="btn btn-primary"
                   type="submit"/>
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
                category_id: '',
                thumbnail: null,
            },
            errors: {},
            form_submitting: false,
        };
    },
    mounted() {
        axios.get('api/categories')
            .then(response => {
                this.categories = response.data.data;
            });
    },
    methods: {
        select_file() {
            this.fields.thumbnail = event.target.files[0];
        },
        submit_form() {
            this.form_submitting = true;

            let fields = new FormData();
            for (let key in this.fields) {
                fields.append(key, this.fields[key]);
            }

            axios.post('api/posts', fields)
                .then(response => {
                    this.$router.push('/');
                    this.form_submitting = false;
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                    this.form_submitting = false;
                });
        }
    }
};
</script>
