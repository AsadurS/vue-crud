<template>
    <div  id="app" class="container mt-5">
        <div class="card">
            <div class="row m-1">
                <section class="col-md-12">
                    <!-- class="sr-only" will hide from the screen -->
                    <form enctype="multipart/form-data"  @submit.prevent="submitForm()">
                        <div class="form-group row">
                            <div class="col-md-6 p1">
                                <label for="inputName">Name</label>
                                <input class="form-control" type="text" id="inputName" placeholder="Name" v-model="form.name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail">Email</label>
                                <input type="email" id="inputEmail" placeholder="Email" class="form-control" v-model="form.email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div style="width: 97%"><h5>Mailing Address:</h5></div>
                            <div class="col-md-4 p1">
                                <label for="select-division">Division</label>
                                <select id="division" class="form-control" v-model="form.division" @change="divisionChange()">
                                    <option v-for=" divisionName in divisionNames" :value="divisionName.id">{{divisionName.name}}</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="selectDistrict">District</label>
                                <select id="district" class="form-control" v-model="form.district" @change="districtsChange">
                                    <option v-for="districtName in districtNames"  :value="districtName.id">{{districtName.name}}</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="upozila">Upozila</label>
                                <select id="upozil" class="form-control" v-model="form.upozila">
                                    <option v-for=" upozilaName in upozilaNames" :value="upozilaName.id">{{upozilaName.name}}</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info pull-right"> Submit </button>
                    </form>

                    <table class="table">
                     <tr >
                         <th>Name</th>
                         <th>email</th>
                         <th>Division</th>
                         <th>District</th>
                         <th>Upozila</th>
                        <th>Insert Date</th>
                        <th>action</th>
                     </tr>
                        <tr v-for="applicant in applicants">
                            <th>{{applicant.name}}</th>
                            <th>{{applicant.email}}</th>
                            <th>{{applicant.division.name}}</th>
                            <th>{{applicant.district.name}}</th>
                            <th>{{applicant.upozila.name}}</th>
                            <th>{{applicant.created_at}}</th>
                            <th>edit</th>
                        </tr>
                    </table>
                </section>
            </div>
            <!-- row -->
        </div>
    </div>
</template>
<script>
    export default{
        props:[
            'applicants', "divisionNames"],
        data() {
            return{
              form:{
                  name:"",
                  email:'',
                  division:null,
                  district:null, upozila:null,
              },
                districtNames:null,
                upozilaNames:''
            }
        },
        watch:{

        },
        methods:{
            submitForm()
            {

               axios.get('/applicant/filter',{
                   params:
                       {
                           name:this.form.name,
                           email:this.form.email,
                           division:this.form.division,
                           district:this.form.district,
                           upozila:this.form.upozila,
                       }
                   }
               ).then( (response)=> {
                       this.applicants =response.data.applicants;
                   })
            },

            divisionChange()
            {
                axios.get('/applicant/get/district', {
                    params: {
                        id: this.form.division
                    }
                })
                    .then( (response)=> {
                        this.districtNames =response.data.districts;
                        this.upozilaNames =null;
                        this.district = null;
                        this.upozila = null;
                    })
            },

            districtsChange()
            {
                axios.get('/applicant/get/upozila', {
                    params: {
                        id: this.form.district
                    }
                })
                    .then((response)=> {
                        this.upozilaNames =response.data.upozilas;
                        this.upozila = null;
                    })
            }
        },

    }
</script>

