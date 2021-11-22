import VueRouter from 'vue-router';
import CourseIndex from "../../components/courses/student/CourseIndex";
import LessonsIndex from "../../components/courses/student/lessons/LessonsIndex";
import MaterialIndex from "../../components/courses/student/materials/MaterialIndex";


//courses
export default [
    {
        path: '/student/courses',
        component: CourseIndex,
        name: 'studentIndexCourse'
    },
    {
        path: '/student/courses/lesson/:course_id',
        component: LessonsIndex,
        name: 'studentIndexLesson'
    },
    {
        path: '/student/courses/lesson/material/:lesson_id',
        component: MaterialIndex,
        name: 'studentIndexMaterial'
    },
];