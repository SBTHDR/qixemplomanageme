<template>
    <div class="row justify-content-center">
        <div class="col-md-12">

            
        
            

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Employees List
                    <a href="" class="btn btn-primary">Create Country</a>
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
                          
                            <tr>
                                <th></th>
                                <th></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="d-flex align-items-center">
                                    <div>
                                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                                    </div>
                                    <div class="ml-3">
                                        <form action="" method="POST">
                                            
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
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

}
</script>

<style>

</style>