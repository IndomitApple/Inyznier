<template>
    <div>
        <div class="card">
            <div class="card-header">Wybierz datę</div>
            <div class="card-body">
                <datepicker class="my-datepicker" calendar-class="my-datepicker_calendar" :disabledDates="disabledDates" :format="customDate" :v-model="time" :inline="true"></datepicker>
            </div>

        <div class="card mt-5">
            <div class="card-header">Dostępni lekarze</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nr</th>
                            <th>Zdjęcie</th>
                            <th>Imię i nazwisko</th>
                            <th>Specjalizacja</th>
                            <th>Wizyta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(d,index) in doctors" v-if="!loading">
                            <th scope="row">{{index+1}}</th>
                            <td>
                                <img :src=" '/images/' + d.doctor.image" width="80">
                            </td>
                            <td>{{d.doctor.name}}</td>
                            <td>{{d.doctor.department}}</td>
                            <td>
                                <a :href="'/new-appointment/'+d.user_id+'/'+d.date">
                                    <button class="btn btn-success">Umów wizytę</button>
                                </a>
                            </td>
                        </tr>
                        <td v-if="doctors.length==0">W tym dniu nie ma już wolnych terminów {{this.time}}</td>
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

export default {
    data(){
        return{
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
