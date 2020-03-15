<template>
<div >
    <div class="barre">
        <div class="debut" :style="{width:((nbweek-1)*1.923)+'%'}"></div>
        <div :class="getId" v-if="somme<100" :style="{width:((nbduree)*1.923)+'%'}" >{{getChamp}} </div>
        <div :class="getId" v-if="somme>100" :style="{width:(101.72 - nbweek*1.923) +'%'}" >{{getChamp}} </div>
        <div :class="getId" v-if="somme>100" :style="{width:(somme-100)+'%'}" >{{getChamp}} </div>
        <div class="end" v-if="somme<100" :style="{width:((52 - (somme/1.92))*1.923 ) +'%' } " ></div>
        <div class="end" v-if="somme>100" :style="{width:((52 - ((somme-100)/1.92))*1.923 ) +'%' } " ></div>
    </div>
    <div class="reap">
        <span :class="getClass"></span>
        <span class="texte">{{getChamp}}</span>
    </div>
</div>
</template>
<script>
import Week from './Week'
import moment from 'moment'
export default {
    props:['debut','duree','turn','activities'],
    data(){
        return{
            week: new Week(this.debut.year()),
            date: moment(this.debut),
            longueur: this.duree,
            ide:this.turn,
            champ:this.activities
        }
    },
    computed:{
        nbweek(){//récupère le numéro de la semaine
            return this.date.format('WW')
        },
        somme(){
            const somme = parseInt(this.date.format('WW') ,10) + parseInt(this.longueur,10)
            return (somme-1)*1.923
        },
        nbduree(){//permet de recupéré la duree de l'activité
            return this.longueur
            },               
        getId(){
            return "activity" + this.ide
        } ,
        getChamp(){
            return this.champ
        },
        getClass(){
            return "activity" + this.ide
        } 
   }
   
}
</script>
<style lang="scss">
$class:product0;
$class:product1;
$class:product2;
$class:product3;
$class:product4;
$class:product5;
div{
    position: relative;
    .barre{
        width: 100%;
        position: relative;
        }
        .debut{
        width: 20px;
        height: 30px;
        background-color: rgb(201, 196, 196);
        float: left;
        text-align: center;
        }
        .activity0{
            background-color: red;
            height: 30px;
            text-align: center;
            float: left;
            color:white;
        }
        .activity1{
            height: 30px;
            background-color: rgb(11, 25, 156);
            text-align: center;
            float: left;
            color:white;
        }
        .activity2{
            height: 30px;
            background-color: rgb(15, 83, 36);
            text-align: center;
            float: left;
            color:white;
        }
        .activity3{
            height: 30px;
            background-color: rgb(219, 112, 24);
            text-align: center;
            float: left;
            color:white;
        }
        .activity4{
            height: 30px;
            background-color: rgb(219, 24, 154);
            text-align: center;
            float: left;
            color:white;
        }
        .activity5{
            height: 30px;
            background-color: rgb(200, 219, 24);
            text-align: center;
            float: left;
            color:white;
        }
        .end{
            width: 20px;
            height: 30px;
            background-color: rgb(201, 196, 196);
            float: left;
            text-align: center;
        }
}
.reap{
    position: absolute;
    top:200px;
    .activity0{
        height: 5px;width: 50px;
        background-color: red;
        display: inline-block;
        vertical-align: bottom;
    }
    .activity1{
        height: 5px;width: 50px;
        background-color: rgb(11, 25, 156);
        display: inline-block;
    }
    .activity2{
        height: 5px;width: 50px;
        background-color: rgb(15, 83, 36);
        display: inline-block;
    }
    .activity3{
        height: 5px;width: 50px;
        background-color: rgb(219, 112, 24);
        display: inline-block;
    }
    .activity4{
        height: 5px;width: 50px;
        background-color: rgb(219, 24, 154);
        display: inline-block;
    }
    .activity5{
        height: 5px;width: 50px;
        background-color: rgb(200, 219, 24);
        display: inline-block;
    }
    .texte{
        display: inline-block;
        position: relative;
        top:-10px; 
        margin-left: 15px;
    }
}

</style>