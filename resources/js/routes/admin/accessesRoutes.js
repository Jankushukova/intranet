//accesses
import AccessIndex from "../../components/accesses/AccessIndex";
import StudentIndex from "../../components/accesses/students/StudentIndex";
import TeacherIndex from "../../components/accesses/teachers/TeacherIndex";

export default [
    {
        path: '/admin/accesses',
        component: AccessIndex,
        name: 'indexAccess'
    },
    {
        path: '/admin/accesses/students',
        component: StudentIndex,
        name: 'studentAccessIndex'
    },
    {
        path: '/admin/accesses/teachers',
        component: TeacherIndex,
        name: 'teacherAccessIndex'
    },

];

// {
//     path: '/admin/courses',
//         name:'courses',
//     component: CoursesWrapper,
//     children: [
//     {
//         path: '/admin/courses/create',
//         component: CoursesCreate,
//         name: 'createCourse'
//     },
//     {
//         path: '/admin/courses/edit',
//         component: CoursesEdit,
//         name: 'editCourse'
//     },
//     {
//         path: '/admin/courses/lesson:course_id',
//         component: LessonsIndex,
//         name: 'indexLesson'
//     },
//     {
//         path: '/admin/courses/lesson/create:course_id',
//         component: LessonCreate,
//         name: 'createLesson'
//     }, {
//         path: '/admin/courses/lesson/edit:lesson_id',
//         component: LessonEdit,
//         name: 'editLesson'
//     },
//     {
//         path: '/admin/courses/lesson/material:lesson_id',
//         component: MaterialIndex,
//         name: 'indexMaterial'
//     },
//     {
//         path: '/admin/courses/lesson/material/create:lesson_id',
//         component: MaterialCreate,
//         name: 'createMaterial'
//     },
//     {
//         path: '/admin/courses/lesson/material/edit:material_id',
//         component: MaterialEdit,
//         name: 'editMaterial'
//     },
// ],
// },
// {
//     path: '/admin/groups',
//         component: GroupsWrapper,
//     name: 'wrapperGroup',
//     children: [
//     {
//         path: '/admin/groups/',
//         component: GroupIndex,
//         name: 'indexGroup'
//     },
//     {
//         path: '/admin/groups/create',
//         component: GroupCreate,
//         name: 'createGroup'
//     },
//     {
//         path: '/admin/groups/teachers:group_id',
//         component: GroupTeacherIndex,
//         name: 'indexGroupTeachers'
//     },
//     {
//         path: '/admin/groups/teachers/create:group_id',
//         component: GroupTeacherCreate,
//         name: 'createGroupTeachers'
//     },
//     {
//         path: '/admin/groups/students:group_id',
//         component: GroupStudentIndex,
//         name: 'indexGroupStudents'
//     },
//     {
//         path: '/admin/groups/students/create:group_id',
//         component: GroupStudentCreate,
//         name: 'createGroupStudents'
//     },
//
//
// ],
// },
// {
//     path: '/admin/users',
//         component: UsersWrapper,
//     children: [
//     {
//         path: '/admin/users/',
//         component: UserIndex,
//         name: 'indexUser'
//     },
//     {
//         path: '/admin/users/create',
//         component: UserCreate,
//         name: 'createUser'
//     }, {
//         path: '/admin/users/edit:user_id',
//         component: UserEdit,
//         name: 'editUser'
//     },
//     {
//         path: '/admin/users/teachers',
//         component: UserTeacherIndex,
//         name: 'indexUserTeacher'
//     },
//     {
//         path: '/admin/users/students',
//         component: UserStudentIndex,
//         name: 'indexUserStudent'
//     },
//
// ],
// },
// {
//     path: '/admin/accesses',
//         component: AccessesWrapper,
//     name: 'wrapperAccess',
//     children: [
//     {
//         path: '/admin/accesses/',
//         component: AccessIndex,
//         name: 'indexAccess'
//     },
//     {
//         path: '/admin/accesses/students',
//         component: StudentIndex,
//         name: 'studentAccessIndex'
//     },
//     {
//         path: '/admin/accesses/teachers',
//         component: TeacherIndex,
//         name: 'teacherAccessIndex'
//     },
// ],
// },
