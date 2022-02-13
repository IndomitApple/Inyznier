<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h2>Wybierz datę</h2>
            </div>
            <div class="card-body">
                <datepicker class="my-datepicker" calendar-class="my-datepicker_calendar" :disabledDates="disabledDates" :format="customDate" :v-model="time" :inline="true" :language="pl"></datepicker>
            </div>

        <div class="card mt-5">
            <div class="card-header">
                <h2>Dostępni lekarze</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive-sm text-nowrap">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Zdjęcie</th>
                            <th >Imię i nazwisko</th>
                            <th>Specjalizacja</th>
                            <th>Wizyta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(d,index) in doctors" v-if="!loading">
                            <th scope="row"></th>
                            <td>
                                <img :src=" '/images/' + d.doctor.image" width="80" class="img-fluid">
                            </td>
                            <td>{{d.doctor.name}}</td>
                            <td>{{d.doctor.department}}</td>
                            <td>
                                <a :href="'/new-appointment/'+d.user_id+'/'+d.date">
                                    <button class="btn btn-success">Umów wizytę</button>
                                </a>
                            </td>
                        </tr>
                        <th v-if="doctors.length==0" class="col-sm-6">Brak wolnych terminów.</th>
                    </tbody>
                </table>
                <div class="text-center">
                    <pulse-loader :loading="loading" :color="color" :size="size"></pulse-loader>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import datepicker from 'vuejs-datepicker';
import moment from 'moment';
import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
import {en, pl} from 'vuejs-datepicker/dist/locale';

export default {
    data(){
        return{
            en: en,
            pl: pl,
            time:'',
            doctors:[],
            loading:false,
            disabledDates:{
                to:new Date(Date.now() - 86400000)
            }
        }
    },
    components:{
        datepicker,
        PulseLoader
    },
    methods:{
        customDate(date){
            this.loading = true
            this.time = moment(date).format('YYYY-MM-DD');
            axios.post('/api/finddoctors',{date:this.time}).
            then((response)=>{
                setTimeout(()=>{
                    this.doctors=response.data
                    this.loading=false
                },200)
                this.doctors = response.data
            }).catch((error)=>{alert('Niepoprawna operacja')})
        }
    },
    mounted(){
        this.loading=true
        axios.get('api/doctors/today').then((response)=>{
            this.doctors = response.data
            this.loading = false
        })
    }
}
</script>

<style scoped>
    .my-datepicker >>> .my-datepicker_calendar{
        width: 100%;
        height: 330px;
        font-weight: bold;
    }
</style>
