class TimeService {

    getAll() {
        return axios.get('/api/v1/times');
    }

}

export default new TimeService();