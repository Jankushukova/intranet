//courses
import CoursesCreate from "../../components/courses/admin/CoursesCreate";
import CourseIndex from "../../components/courses/admin/CourseIndex";
import CoursesEdit from "../../components/courses/admin/CoursesEdit";
import LessonsIndex from "../../components/courses/admin/lessons/LessonsIndex";
import LessonCreate from "../../components/courses/admin/lessons/LessonCreate";
import LessonEdit from "../../components/courses/admin/lessons/LessonEdit";
import MaterialIndex from "../../components/courses/admin/materials/MaterialIndex";
import MaterialCreate from "../../components/courses/admin/materials/MaterialCreate";
import MaterialEdit from "../../components/courses/admin/materials/MaterialEdit";


export default [
    {
        path: '/admin/courses/',
        component: CourseIndex,
        name: 'indexCourse'
    },
    {
        path: '/admin/courses/create',
        component: CoursesCreate,
        name: 'createCourse'
    },
    {
        path: '/admin/courses/edit',
        component: CoursesEdit,
        name: 'editCourse'
    },
    {
        path: '/admin/courses/lesson/:course_id',
        component: LessonsIndex,
        name: 'indexLesson'
    },
    {
        path: '/admin/courses/lesson/create/:course_id',
        component: LessonCreate,
        name: 'createLesson'
    },
    {
        path: '/admin/courses/lesson/edit/:lesson_id',
        component: LessonEdit,
        name: 'editLesson'
    },
    {
        path: '/admin/courses/lesson/material/:lesson_id',
        component: MaterialIndex,
        name: 'indexMaterial'
    },
    {
        path: '/admin/courses/lesson/material/create/:lesson_id',
        component: MaterialCreate,
        name: 'createMaterial'
    },
    {
        path: '/admin/courses/lesson/material/edit/:material_id',
        component: MaterialEdit,
        name: 'editMaterial'
    },

];
