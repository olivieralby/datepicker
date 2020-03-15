<template>
    <div class="planning" >
        <planning-agenda :debut="debut" :duree="duree" :turn="turn" :activities="activities" />
    </div>
</template>
<script>
    import moment from 'moment'
    import PlanningAgenda from './PlanningAgenda'
export default {
    props:{
        value:String,
        activity:String,
        jour:String,
        modif:String
        },
        components:{PlanningAgenda},
    data(){
        return {
           activities: this.activity,
           debut: moment(this.value),
           duree:this.jour,
           turn:this.modif
        }
    },
    
    
}
</script>
    
