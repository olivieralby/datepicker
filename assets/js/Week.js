import Moment from 'moment'
import {extendMoment} from 'moment-range'
const moment = extendMoment(Moment)
export default class Week{

    constructor(year){
        this.year = year
        this.start = moment([this.year]).add(1 ,'day')
        this.end = this.start.clone().endOf('year')
        
    }
    /**
     * @return la semaine de la date
     */
    getWeek(){
        const weeks = Array.from(moment.range(this.start, this.end).by('week'));
        return weeks;
    }
}