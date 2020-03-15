import Moment from 'moment'
import {extendMoment} from 'moment-range'
const moment = extendMoment(Moment)
export default class Month{

    constructor(month, year){
        this.month = month
        this.year = year
        this.start = moment([this.year, this.month])
        this.end = this.start.clone().endOf('month')
       
    }

    /**
     * @return le jour avant le mois
     */
    getFirst(){
        return this.start.weekday()
    }

    /**
     * retourne les jours du mois
     * @return int
     */
    getDays(){
        
        return Array.from(moment.range(this.start, this.end).by('days'))
        
        
    }
    getMonth(){
        return this.start.format('MMMM YYYY')
    }

   
}