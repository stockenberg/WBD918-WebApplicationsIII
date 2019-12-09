import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    posts: null
  },
  mutations: {
  },
  actions: {
    fetchPosts() {
      axios.get('/posts').then(posts => {
        this.state.posts = posts.data;
      })
    },
    destroyPost(state, payload) {
        return axios.delete(`/${payload}`);
    }
  },
  modules: {
  }
})
