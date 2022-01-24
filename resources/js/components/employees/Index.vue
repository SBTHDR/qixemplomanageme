<template>
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div v-if="showMessage" class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Employees List
                    <router-link :to="{ name: 'EmployeesCreate' }" class="btn btn-primary">Create Country</router-link>
                </div>

                <div class="card-body">

                    <form method="GET">
                        
                        <div class="form-row align-items-center">
                          <div class="col-auto">
                            <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search by name...">
                          </div>
                          
                          <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                          </div>
                        </div>
                    </form>

                    <table class="table table-bordered border-primary">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Zip</th>
                            <th scope="col">Birthday</th>
                            <th scope="col">Date Hire</th>
                            <th scope="col">Country Name</th>
                            <th scope="col">State Name</th>
                            <th scope="col">City Name</th>
                            <th scope="col">Department Name</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                            <tr v-for="employee in employees" :key="employee.id">
                                <th>{{ employee.id }}</th>
                                <th>{{ employee.first_name }}</th>
                                <td>{{ employee.last_name }}</td>
                                <td>{{ employee.address }}</td>
                                <td>{{ employee.zip_code }}</td>
                                <td>{{ employee.birthday }}</td>
                                <td>{{ employee.date_hired }}</td>
                                <td>{{ employee.country.name }}</td>
                                <td>{{ employee.state.name }}</td>
                                <td>{{ employee.city.name }}</td>
                                <td>{{ employee.department.name }}</td>
                                <td class="d-flex align-items-center">
                                    <div>
                                        <router-link :to="{ name: 'EmployeesEdit', params: { id: employee.id } }" class="btn btn-primary btn-sm">Edit</router-link>
                                    </div>
                                    <div class="ml-3">
                                        <button type="submit" @click="deleteEmployee(employee.id)" class="btn btn-danger btn-sm">Delete</button>
                                    </div>                                
                                </td>
                            </tr>
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            employees: [],
            showMessage: false,
            message: '',
        }
    },
    methods: {
        getEmployees() {
            axios.get('/api/employees')
                .then(res => {
                    this.employees = res.data.data
                })
                .catch(err => {
                    console.log(err)
                })
        },
        deleteEmployee(id) {
            axios.delete('/api/employees/' + id)
                .then(res => {
                    this.showMessage = true;
                    this.message = res.data
                    this.getEmployees();
                })
                .catch(err => {
                    console.log(err)
                })
        }
    },
    created () {
        this.getEmployees();
    },
}
</script>

<style>

</style>