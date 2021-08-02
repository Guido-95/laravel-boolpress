import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import Home from './pages/Home';
import About from './pages/About';
import Blog from './pages/Blog';
import SinglePost from './pages/SinglePost';
import NotFound from './components/NotFound';

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path:'/',
            component: Home,
            name:'home'
        },
        {
            path:'/about',
            component: About,
            name:'about'
        },
        {
            path:'/blog',
            component: Blog,
            name:'blog'
        },
        {
            path:'/blog/:slug',
            component:SinglePost,
            name:'single-post'
        },
        {
            path:'*',
            component:NotFound,
            
        }
      
    ]
});

export default router;