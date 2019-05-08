import axios from "axios";

export default {
    state: {
        category: [],
        post: [],
        
    },
    getters: {
        getCategory(state) {
            return state.category
        },
        getAllPost(state) {
            return state.post
        },
    },
    actions: {
        allCategory(context){
           axios.get('/category')
                .then((response)=>{
                    //console.log(response.data.categories)
                    context.commit('categoreis',response.data.categories)
                })
        },
        getAllPost(context) {
            axios.get('/post')
                .then((response) => {
                    //console.log(response.data.posts);
                    context.commit('allposts',response.data.posts)
            })
        }
    },
    mutations: {
        categoreis(state, data) {
            return state.category = data
        },
        allposts(state, data) {
            return state.post = data
        },

    }
}