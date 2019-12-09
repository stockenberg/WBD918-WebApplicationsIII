import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import Blog from "../views/Blog.vue";
import ShowDemo from "../views/ShowDemo";
import ComponentDemo from "../components/ComponentDemo";
import ManagePosts from "../views/posts/ManagePosts";
import EditPost from "../views/posts/EditPost";


Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "home",
    component: Home
  },
  {
    path: "/blog",
    name: "blog",
    component: Blog
  },
  {
    path: '/demo',
    name: 'demo',
    component: ComponentDemo
  },
  {
    path: '/show-demo',
    name: 'show-demo',
    component: ShowDemo
  },
  /** Posts */
  {
    path: '/manage-posts',
    name: 'manage-posts',
    component: ManagePosts
  },
  {
    path: '/edit-post/:id',
    name: 'edit-post',
    component: EditPost
  },

];

const router = new VueRouter({
  routes
});

export default router;
