import VueRouter from 'vue-router';

import CoursesWrapper from "../components/courses/CoursesWrapper";
import GroupsWrapper from "../components/groups/GroupsWrapper";
import UsersWrapper from "../components/users/UsersWrapper";
import AccessesWrapper from "../components/accesses/AccessesWrapper";


import ExampleComponent from "../components/ExampleComponent";
import NotFoundComponent from "../components/NotFoundComponent";
import coursesRoutesAdmin from "./admin/coursesRoutes";
import coursesRoutesStudent from "./student/coursesRoutes";
import groupsRoutes from "./admin/groupsRoutes";
import usersRoutes from "./admin/usersRoutes";
import accessesRoutes from "./admin/accessesRoutes";

window.Vue = require('vue');

window.Vue.use(VueRouter);


var router = new VueRouter({
    routes: [
        {
            path: '/',
            redirect: 'index'
        },
        {
            path: '/index',
            component: ExampleComponent,
            name: "index",
        },
        {
            path: '/student/courses',
            component: CoursesWrapper,
            name: 'wrapperCourseStudent',
            children: [...coursesRoutesStudent]
        },
        {
            path: '/admin/courses',
            component: CoursesWrapper,
            name: 'wrapperCourse',
            children: [...coursesRoutesAdmin]
        },
        {
            path: '/admin/groups',
            component: GroupsWrapper,
            name: 'wrapperGroup',
            children: [...groupsRoutes]

        },
        {
            path: '/admin/users',
            component: UsersWrapper,
            name: 'wrapperUser',
            children: [...usersRoutes]
        },
        {
            path: '/admin/accesses',
            component: AccessesWrapper,
            name: 'wrapperAccess',
            children: [...accessesRoutes],
        },
        {
            path: '*',
            component: NotFoundComponent,
            name: 'notFound'
        }
    ]
});
export default router
