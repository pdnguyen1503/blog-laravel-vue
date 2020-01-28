import Axios from "axios"

export default {
    state: {
        category: [],
        post: [],
        blogpost: []
    },
    getters: {
        getCategory(state) {
            return state.category
        },
        getAllPost(state) {
            return state.post
        },
        getBlogPost(state) {
            return state.blogpost
        }
    },
    actions: {
        allCategory(context) {
            Axios.get('/categories')
                .then((response) => {
                    context.commit('categories', response.data.categories);
                })
        },
        getAllPost(context) {
            Axios.get('/posts')
                .then((response) => {
                    context.commit('allpost', response.data.posts);
                })
        },
        getBlogPost(context) {
            Axios.get('/blog-posts')
                .then((response) => {
                    context.commit('getallblogpost', response.data.blogPosts);
                })
        }
    },
    mutations: {
        categories(state, data) {
            return state.category = data;
        },
        allpost(state, data) {
            return state.post = data
        },
        getallblogpost(state, data) {
            return state.blogpost = data
        }
    }
}