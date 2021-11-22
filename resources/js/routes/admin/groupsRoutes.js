//courses
import GroupIndex from "../../components/groups/GroupIndex";
// import GroupCreate from "../../components/groups/GroupCreate";
import GroupTeacherIndex from "../../components/groups/teacher/GroupTeacherIndex";
import GroupTeacherCreate from "../../components/groups/teacher/GroupTeacherCreate";
import GroupStudentIndex from "../../components/groups/student/GroupStudentIndex";
import GroupStudentCreate from "../../components/groups/student/GroupStudentCreate";


export default [
    {
        path: '/admin/groups',
        component: GroupIndex,
        name: 'indexGroup'
    },
    // {
    //     path: '/admin/groups/create',
    //     component: GroupCreate,
    //     name: 'createGroup'
    // },
    {
        path: '/admin/groups/teachers/:group_id',
        component: GroupTeacherIndex,
        name: 'indexGroupTeachers'
    },
    {
        path: '/admin/groups/teachers/create/:group_id',
        component: GroupTeacherCreate,
        name: 'createGroupTeachers'
    },
    {
        path: '/admin/groups/students/:group_id',
        component: GroupStudentIndex,
        name: 'indexGroupStudents'
    },
    {
        path: '/admin/groups/students/create/:group_id',
        component: GroupStudentCreate,
        name: 'createGroupStudents'
    },

];

