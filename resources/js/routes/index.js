import PostsIndex from "../components/posts";
import PostsCreate from "../components/posts/create";
import PostsEdit from "../components/posts/edit";



export default {
    mode: 'history',
    routes: [
        {
            path: '/',
            component: PostsIndex,
            name: 'posts.index'
        },
        {
            path: '/create',
            component: PostsCreate,
            name: 'posts.create'
        },
        {
            path: '/edit/:id',
            component: PostsEdit,
            name: 'posts.edit'
        },
    ]
};
