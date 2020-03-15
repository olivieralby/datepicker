<template>
     <div class="agenda">
        <div class="header">
            <div class="header_year">{{year}} </div>
            <div class="header_month">{{month}} </div>
        </div>
        <div class="choise">
            <div class="next" @click="prev"><i class="material-icons">
keyboard_arrow_left
            </i></div>
            <div class="choise_month">{{ month2.getMonth()}} </div>
            <div class="prev" @click="next"><i class="material-icons">
keyboard_arrow_right
</i></div>
        </div>
        <div class="title_days" >
            <div class="title_day" v-for="day in days" :key="day" >{{day}} </div>
        </div>
        <div class="datepicker_days">
                <div class="datepicker_day"  v-bind:style="{width:(month2.getFirst()*30)+'px'} " ></div><!-- defini le style -->
            <div class="datepicker_day" @click="selectDate(day)"  v-for="day in month2.getDays()" :key="day.toString()" :class="{lected: isSelect(day)}"> 
                <span class="effect"></span>
                <span class="text">{{day.format('D')}} </span> 
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment'
moment.locale('fr-FR')
import Month from './Month'
export default {
    props:['date_fin'],
    data(){
        return {
            days:['L','M','Me','J','V','S','D'],
            month2: new Month(this.date_fin.month(), this.date_fin.year())
        }
    },
    computed:{
        year(){
            return this.date_fin.format('YYYY')
        },
        month(){
            return this.date_fin.format('DD MMMM ')
        }
    },
    methods:{
        next(){
            let month = this.month2.month +1
            let year = this.month2.year
            if(month>11){
                month = 0
                year = year + 1
            }

            this.month2 = new Month(month, year)
        },
        prev(){
            let month = this.month2.month -1
            let year = this.month2.year
            if(month<0){
                month = 11
                year = year - 1
            }

            this.month2 = new Month(month, year)
        },
        selectDate(day){
            this.date_fin = day

        },
        isSelect(day){
            this.$emit('changered', this.date_fin)
            return this.date_fin.unix()===day.unix()
        },
       
    }
}
</script>
<style lang="scss">
    .agenda{
    font-family: sans-serif;
    width: 230px;
    height:300px;
    box-shadow:0px 0px 5px black ;
    position: absolute;
    z-index: 100;
    background-color: #fff;
    .header{
        height: 80px;
        background-color: #87bb34;
        color:#fff;
        text-align: center;
        .header_year{
            padding:8px;
        }
        .header_month{
            padding: 8px;
        }
    }
    .choise{
        height: 24px;
        display: flex;
        justify-content: space-evenly;
       
        .prev{
            height: 32px;
            width: 32px;
            cursor:pointer;
        }
        .next{
            height: 32px;
            width: 32px;
            cursor:pointer;
        }
        .choise_month{
            text-align: center;
        }
    }
    
    .title_days{
        height: 16px;
        padding: 10px;
        .title_day{
            line-height: 16px;
            float:left;
            width: 30px;
            font-size:14px;
        }
    }
    .datepicker_days{
        //padding:0 10px 0 10px;
        position: relative;

        .datepicker_day{
            width:30px;
            height: 24px;
            float: left;
            text-align: center;
            position: relative;
        }
            .datepicker_day.lected{
           
               .effect{
                   display: block;
                    height: 30px;
                    width: 30px;
                    border-radius: 30px;
                    background-color: #87bb34;
                    position: absolute;
                    z-index: -1;
                    top:-7px;
               }
               .text{
                   color:white;
                   z-index: 10;
               }
                
            }
    }
}
    
</style>