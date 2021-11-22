class WeekDayService {

    getAll() {
        return axios.get('/api/v1/weekDays');
    }

}

export default new WeekDayService();