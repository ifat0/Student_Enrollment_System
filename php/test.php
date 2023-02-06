<?php
session_start();
include 'dbh.class.php';

class users{
    public $id;
    public $name;
    public $phone;
    public $address;
    public $Email;
}

//fetching user data
$database=new dbh();
$sql=$database->getdata("select id,user_Name,user_phone, user_address,user_Email from users where status='active'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Admin Panel</title>
    <?php
        include "header.php";
    ?>
</head>

<body>

    <!-- creating table to show users information in the table -->
    <div class="table-responsive-lg">
        <table class=" table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PHONE</th>
                    <th scope="col">ADDRESS</th>
                </tr>

            </thead>
            <tbody>
                <?php
        $i=1;
        while($row=$sql->fetch(PDO::FETCH_ASSOC)){?>
                <tr>
                    <th scope="row"><?php echo $i?></th>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['user_Name']?></td>
                    <td><?php echo $row['user_Email']?></td>
                    <td><?php echo $row['user_phone']?></td>
                    <td><?php echo $row['user_address']?></td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                            data-whatever="<?php echo $i?>">Edit</button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update User Information</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">ID:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    placeholder="<?php echo $i?>">
                                            </div>
                                        </form>
                                        <!-- <script src=""></script> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
            $i++;
            }
        ?>
            </tbody>
        </table>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>