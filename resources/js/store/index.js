import Axios from "axios"

export default {
    state: {
        category: [],
        post: []
    },
    getters: {
        getCategory(state) {
            return state.category
        },
        getAllPost(state) {
            return state.post
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
        }
    },
    mutations: {
        categories(state, data) {
            return state.category = data;
        },
        allpost(state, data) {
            return state.post = data
        }
    }
}