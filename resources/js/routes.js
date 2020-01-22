import AdminHome from './components/admin/AdminHome.vue'
import listCategory from './components/admin/category/List.vue'
import addCategory from './components/admin/category/New.vue'
import editCategory from './components/admin/category/Edit.vue'
// component of post
import listPost from './components/admin/post/List.vue'
import addPost from './components/admin/post/New.vue'
import editPost from './components/admin/post/Edit.vue'

export const routes = [{
        path: '/home',
        component: AdminHome
    },
    {
        path: '/categories',
        component: listCategory
    },
    {
        path: '/add-category',
        component: addCategory
    },
    {
        path: '/edit-category/:categoryid', // truyen id qua component Edit
        component: editCategory
    },
    //Route Post
    {
        path: '/posts',
        component: listPost
    },
    {
        path: '/add-post',
        component: addPost
    },
    {
        path: '/edit-post/:postId', // truyen id qua component Edit
        component: editPost
    }
]