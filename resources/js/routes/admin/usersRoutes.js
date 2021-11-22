//users
import UserIndex from "../../components/users/UserIndex";
import UserCreate from "../../components/users/UserCreate";
import UserEdit from "../../components/users/UserEdit";
import UserTeacherIndex from "../../components/users/teacher/UserTeacherIndex";
import UserStudentIndex from "../../components/users/student/UserStudentIndex";


export default [
    {
        path: '/admin/users',
        component: UserIndex,
        name: 'indexUser'
    },
    {
        path: '/admin/users/create',
        component: UserCreate,
        name: 'createUser'
    }, {
        path: '/admin/users/edit/:user_id',
        component: UserEdit,
        name: 'editUser'
    },
    {
        path: '/admin/users/teachers',
        component: UserTeacherIndex,
        name: 'indexUserTeacher'
    },
    {
        path: '/admin/users/students',
        component: UserStudentIndex,
        name: 'indexUserStudent'
    },
];
