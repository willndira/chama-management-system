<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Your Profile</h3>
            <div class="bs-example4" data-example-id="contextual-table">
                <table class="table">
                    <thead>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Sur Name</th>
                    <th>Gender</th>
                    <th>Date of birth</th>
                    <th>National ID</th>
                    <th>Type of user</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $user->firstname; ?></td>
                            <td><?php echo $user->middlename; ?></td>
                            <td><?php echo $user->surname; ?></td>
                            <td><?php echo $user->gender; ?></td>
                            <td><?php echo $user->dob; ?></td>
                            <td><?php echo $user->nationalId; ?></td>
                            <td><?php echo $user->type; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>