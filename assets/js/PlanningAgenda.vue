<template>
<div >
    <div class="barre">
        <div class="debut" :style="{width:((nbweek-1)*getNumber)+'%'}"></div>
        <div :class="getId" v-if="somme<=52" :style="{width:((nbduree)*getNumber)+'%'}" ></div>
        <div :class="getId" v-if="somme>52" :style="{width:((52- (nbweek-1))*getNumber) +'%'}" ></div>
        <!-- <div :class="getId" v-if="somme>52" :style="{width:(52-nbduree)*getNumber+'%'}" >{{getChamp}} </div>-->
        <div class="end" v-if="somme<=52" :style="{width:((53 - somme)*getNumber ) +'%' } " ></div>
        <div class="end" v-if="somme>52" :style="{width:((53 - ((somme-1)))*getNumber ) +'%' } " ></div>
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
            return parseInt(this.date.format('WW') ,10)
        },
        somme(){
            const somme = parseInt(this.date.format('WW') ,10) + parseInt(this.longueur,10)
            return (somme)
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
        } ,
        getNumber(){
            return 1.92307692308;
        }
   }
   
}
</script>
<style lang="scss">

div{
    position: relative;
    .barre{
        width: 100%;
        position: relative;
        .debut{
        height: 30px;
        background-color: rgb(209, 206, 206);
        float: left;
        text-align: center;
        }
        
        .activity0{
            background-color: red;
            height: 30px;
            text-align: center;
            float: left;
            color:white;
            font-size:12px;
            position: relative;
            
        }
        .activity1{
            height: 30px;
            background-color: rgb(11, 25, 156);
            text-align: center;
            float: left;
            color:white;
            font-size:12px
        }
        .activity2{
            height: 30px;
            background-color: rgb(15, 83, 36);
            text-align: center;
            float: left;
            color:white;
            font-size:12px
        }
        .activity3{
            height: 30px;
            background-color: rgb(219, 112, 24);
            text-align: center;
            float: left;
            color:white;
            font-size:12px
        }
        .activity4{
            height: 30px;
            background-color: rgb(219, 24, 154);
            text-align: center;
            float: left;
            color:white;
            font-size:12px
        }
        .activity5{
            height: 30px;
            background-color: rgb(200, 219, 24);
            text-align: center;
            float: left;
            color:white;
            font-size: 12px;
        }
        .end{
            width: 20px;
            height: 30px;
            background-color: rgb(229, 231, 229);
            float: left;
            text-align: center;
            z-index: 100;
        }
    }
}
.reap{
    position: absolute;
    top:200px;
    left:100px;
    display: flex;
    justify-content: space-evenly;
    .activity0{
        height: 5px;width: 50px;
        background-color: red;
        display: inline-block;

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