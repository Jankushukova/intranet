class UserService {

    save(newUser) {
        return axios.post('/api/v1/users', newUser);
    }

    getStudents() {
        return axios.get('/api/v1/users/students');
    }

    getTeachers() {
        return axios.get('/api/v1/users/teachers');
    }

    editProfile(userId, editingUser){
        return axios.patch('/api/v1/users/profile/' + userId, editingUser)
    }

    changeUserPassword(userId, pass, password_confirmation){
        return axios.patch('/api/v1/users/password/' + userId, {
            password: pass,
            password_confirmation: password_confirmation
        })
    }

    getUserById(id){
        return axios.get('/api/v1/users/' + id);
    }

}

export default new UserService();