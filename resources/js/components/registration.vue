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
                                <input class="form-control" type="text" id="inputName" placeholder="Name" v-model="form.name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail">Email</label>
                                <input type="email" id="inputEmail" placeholder="Email" class="form-control" v-model="form.email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div style="width: 97%"><h5>Mailing Address:</h5></div>
                            <div class="col-md-4 p1">
                                <label for="select-division">Division</label>
                                <select id="division" class="form-control" v-model="form.division" @change="divisionChange()" required>
                                    <option v-for=" divisionName in divisionNames" :value="divisionName.id">{{divisionName.name}}</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="selectDistrict">District</label>
                                <select id="district" class="form-control" v-model="form.district" @change="districtsChange" required>
                                    <option v-for="districtName in districtNames"  :value="districtName.id">{{districtName.name}}</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="upozila">Upozila</label>
                                      <select id="district" class="form-control" v-model="form.upozila" required>
                                    <option v-for=" upozilaName in upozilaNames" :value="upozilaName.id">{{upozilaName.name}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Address Details</label>
                            <textarea id="inputComments" class="form-control" v-model="form.address"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="language">Language</label>
                            <br/>
                            <label class="radio-inline">
                                <input   value="bangla" type="checkbox" v-model="form.language" >
                                Bangla
                            </label>
                            <label class="radio-inline">
                                <input  value="english" type="checkbox" v-model="form.language">
                                English
                            </label>

                            <label class="radio-inline">
                                <input value="french" type="checkbox" v-model="form.language">
                               French
                            </label>

                        </div>
                        <div class="form-group">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Exam name</th>
                                        <th scope="col">university</th>
                                        <th scope="col">board</th>
                                        <th scope="col">result</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(value,index) in form.qualification " :key="index" >
                                        <td>
                                            <select id="exam" class="form-control" v-model="value.examName" required>
                                                <option v-for="examName in examNames" :value="examName.id">{{examName.name}}</option>

                                            </select>
                                        </td>
                                        <td>
                                            <select id="university" class="form-control" v-model="value.universityName" required>
                                                <option v-for="universityName in universityNames" :value="universityName.id">{{universityName.name}}</option>
                                            </select>
                                        </td>
                                        <td ><select id="board" class="form-control" v-model="value.boardName" required>
                                             <option v-for="boardName in boardNames" :value="boardName.id">{{boardName.name}}</option>
                                        </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control"  v-model="value.result" required>
                                        </td>
                                        <th scope="col">
                                            <button v-if="index===0" type='button' class="btn btn-info" @click="addNewRow()">
                                                Add
                                            </button>
                                            <a  v-else class="btn btn-danger"  @click="deleteRow(index)" >Remove</a>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 p1">
                                <label for="inputName">Image</label>
                                <input type="file" class="form-control" ref="image"   id="image"  accept="image/x-png,image/gif,image/jpeg"@change="handleFileUpload('image')">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail">File</label>
                                <input type="file" id="file" ref="file"  placeholder="Email" class="form-control"  @change="handleFileUpload('file')">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="traninig">Training</label>
                            <br/>
                            <label class="radio-inline">
                                <input value="yes" type="radio" v-model="form.training">
                                Yes
                            </label>
                            <label class="radio-inline">
                                <input value="no" type="radio" v-model="form.training">
                               No
                            </label>
                        </div>
                        <div class="form-group" v-if="form.training ==='yes'">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Training name</th>
                                        <th scope="col">Training Details</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(value,index) in form.trainingDetails " :key="index">
                                        <td>
                                            <input type="text" v-model="value.name" class="form-control">
                                        </td>
                                        <td>
                                           <input type="text" v-model="value.details" class="form-control">
                                        </td>

                                        <th scope="col">
                                            <button v-if="index===0" type='button' class="btn btn-info" @click="addTrainingNewRow()">
                                                Add
                                            </button>
                                            <a  v-else class="btn btn-danger"  @click="deleteTrainingRow(index)" >Remove</a>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <button type="submit" class="btn btn-info pull-right"> Submit </button>
                    </form>
                </section>
            </div>
            <!-- row -->
    </div>
</div>
</template>
<script>
	export default{
		props:[
         'examNames',"boardNames", "universityNames", "divisionNames"],
		  data() {
                return{
                   form: this.formData(),
                   districtNames:{},
                   upozilaNames:{},
                    file:'',
                    image:'',
                }
            },
            watch:{

            },
            methods:{
                formData(){
                    return{
                        name :null,
                        email:null,
                        division:null,
                        district:null,
                        upozila:null,
                        qualification:[{
                            examName: null,
                            universityName:null,
                            boardName:null,
                            result:null,
                        }],
                        training:null,
                        address:null,
                        language:[],
                        trainingDetails:[{
                            name:null,
                            details:null
                        }]
                    }
                },
                addNewRow(){
                 this.form.qualification.push({
                         examName: null,
                         universityName:null,
                         boardName:null,
                         result:null,
                 })
                },
                addTrainingNewRow(){
                    this.form.trainingDetails.push({
                        name:null,
                        details:null
                    })
                },
                deleteRow(index) {
                    console.log(index,);
                    this.form.qualification.splice(index, 1);
                },
                deleteTrainingRow(index) {
                    this.form.trainingDetails.splice(index, 1);
                },
                handleFileUpload(type){
                   if(type==='image'){
                   this.image =	this.$refs.image.files[0];
                   }
                   else{
                   	this.file =	this.$refs.file.files[0];
                   }

                },
                submitForm()
                {
                    let data = new FormData();
                    data.append("file", this.file);
                    data.append("image", this.image);
                axios.post('/applicant/form/submit',{
                    form:this.form,
                })
				  .then(function (response) {
                      data.append("applicant_id", response.data.applicant_id);
                      axios.post('/applicant/file/upload',
                          data,
                          {
                              headers: {
                                  'Content-Type': 'multipart/form-data'
                              },
                          }).then((re)=>{
                          alert("Data HasBeen added Successfully!");
                          this.formData();
                      })
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
					  })
                }
            },
	}
</script>
