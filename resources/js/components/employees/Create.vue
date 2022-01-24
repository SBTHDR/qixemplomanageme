<template>
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Create Employees
                    <router-link :to="{ name: 'EmployeesIndex' }" class="btn btn-primary">Back</router-link>
                </div>

                <div class="card-body">
                    <form >
                        <div class="row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" autocomplete="first_name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" autocomplete="last_name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">First Name</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" autocomplete="address" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-end">First Name</label>

                            <div class="col-md-6">
                                <input id="zip_code" type="text" class="form-control" name="zip_code" autocomplete="zip_code" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="country_id" class="col-md-4 col-form-label text-md-end">Country</label>

                            <div class="col-md-6">
                                <select v-model="form.country_id" @change="getStates()" name="country_id" class="form-control" aria-label="Default select example">
                                    <option v-for="country in countries" :key="country.id" :value="country.id">
                                        {{ country.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="state_id" class="col-md-4 col-form-label text-md-end">State</label>

                            <div class="col-md-6">
                                <select v-model="form.state_id" @change="getCities()" name="state_id" class="form-control" aria-label="Default select example">
                                    <option v-for="state in states" :key="state.id" :value="state.id">
                                        {{ state.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city_id" class="col-md-4 col-form-label text-md-end">City</label>

                            <div class="col-md-6">
                                <select v-model="form.city_id" name="city_id" class="form-control" aria-label="Default select example">
                                    <option v-for="city in cities" :key="city.id" :value="city.id">
                                        {{ city.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="department_id" class="col-md-4 col-form-label text-md-end">Department</label>

                            <div class="col-md-6">
                                <select v-model="form.department_id" name="department_id" class="form-control" aria-label="Default select example">
                                    <option v-for="department in departments" :key="department.id" :value="department.id">
                                        {{ department.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date_hired" class="col-md-4 col-form-label text-md-end">Date Hired</label>

                            <div class="col-md-6">
                                <datepicker :bootstrap-styling="true" class="calender-header" placeholder="Pick hired date"></datepicker>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birthday" class="col-md-4 col-form-label text-md-end">Birthday</label>

                            <div class="col-md-6">
                                <datepicker :bootstrap-styling="true" class="calender-header" placeholder="Pick birthday date"></datepicker>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';

export default {
    components: {
        Datepicker
    },
    data () {
        return {
            countries: [],
            states: [],
            cities: [],
            departments: [],
            form: {
                'department_id': '',
                'country_id': '',
                'state_id': '',
                'city_id': '',
                'first_name': '',
                'last_name': '',
                'address': '',
                'zip_code': '',
                'birthday': null,
                'date_hired': null,
            }
        }
    },
    methods: {
        getCountries() {
            axios.get('/api/employees/countries')
                .then(res => {
                    this.countries = res.data
                })
                .catch(err => {
                    console.log(err)
                })
        },
        getStates() {
            axios.get('/api/employees/' + this.form.country_id + '/states')
                .then(res => {
                    this.states = res.data
                })
                .catch(err => {
                    console.log(err)
                })
        },
        getCities() {
            axios.get('/api/employees/' + this.form.state_id + '/cities')
                .then(res => {
                    this.cities = res.data
                })
                .catch(err => {
                    console.log(err)
                })
        },
        getdepartments() {
            axios.get('/api/employees/departments')
                .then(res => {
                    this.departments = res.data
                })
                .catch(err => {
                    console.log(err)
                })
        },
    },
    created () {
        this.getCountries()
        this.getdepartments()
    }
}
</script>


<style>

</style>