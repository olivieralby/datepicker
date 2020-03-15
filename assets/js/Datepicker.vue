<template>
<div class="content" >
    <div class="datepicker" >
        <form action="" method="post">
            <table>
                <tr>
                    <th>Activité</th>
                    <th>Date Début</th>
                    <th>Date fin</th>
                    <th>Professeur</th>
                    <th>Durée(semaines)</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="activity"/>
                    </td>
                    <td>
                        <div class="date_start">
                            <input type="datetime" name="date_debut" :value="format"  @select="select" @focus="open_datepicker" @blur="close_datepicker"/>
                            <datepicker-agenda :date="date" @select="select" v-if="bool==true" ></datepicker-agenda>
                        </div>
                    </td>
                    <td>
                        <div class="date_end">
                            <input type="datetime" name="date_fin" :value="format2" @changered="changered"  @focus="boolean_start" @blur="close_datepicker"/>
                            <datepicker-agenda-fin :date_fin="date_fin" v-if="bool2" @changered="changered"></datepicker-agenda-fin>
                        </div>
                    </td>
                    <td>
                        <input type="text" name="professeur" @click.prevent="close_date">
                    </td>
                    <td>
                        <input type="number" name="duree" :value=" week" id="">
                    </td>
                    <td>
                        <button type="submit">Ok</button>
                    </td>
                </tr>

            </table>
        </form> 
    </div>
</div>
</template>
<script>
import Moment from 'moment'
import {extendMoment} from 'moment-range'
const moment = extendMoment(Moment)
import DatepickerAgenda from './components/DatepickerAgenda'
import DatepickerAgendaFin from './components/DatepickerAgendaFin'
export default {
    components:{
        DatepickerAgenda,
        DatepickerAgendaFin
    },
    props:{
        value:String,
        
    },
    data(){
        return{
            date: moment(),
            date_fin: moment(),
            bool:false,
            bool2: false,
            nbWeek:null
            }
    },
    computed:{
        format(){
            
            return this.date. format("DD-MM-YYYY")
        },
        format2(){
            return this.date_fin.format('DD-MM-YYYY')
        },
        week(){
            const start = this.date
            const end =this.date_fin
            const range = moment.range(start, end)
            return range.diff('week')
        }
    },
    methods:{
        select(date){
            this.date = date
        },
        
        open_datepicker(){
            this.bool = true
            this.bool2 = false
        },
        boolean_start(){
            this.bool2 = true
            this.bool = false
        },
        close_date(){
            this.bool = false
            this.bool2 = false
        },
        changered(date_fin){
            this.date_fin = date_fin
        },
        close_datepicker(){
           this.bool=false
           this.bool2=false
        }
    }
}
</script>
<style lang="scss">
.content{
    .datepicker{
    }
    table{
            tr{
                th{
                height: 40px;
                }
            }
            tr{
                position: relative;
                td{
                    height: 50px;
                    input{
                        height: 30px;
                        outline: none;
                    }
                    button{
                        height:30px;
                        background-color: #87bb34;
                        border:none;
                        color:white;
                        cursor:pointer;
                    }
                }
            }
        }
}
</style>