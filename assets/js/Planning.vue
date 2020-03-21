<template>
    <div class="planning_barre" >
        
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
<style lang="css">
    .planning_barre{
        width: 100.5%;
        border-bottom: 4px solid rgb(250, 249, 249);

    }
</style>
    
