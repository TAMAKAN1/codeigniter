<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.0/css/font-awesome.css">
</head>

<body>
    <div class="container mt-4">
        <?php
        if ($this->session->flashdata('error')) :
        ?>
            <div class="col-md-12 alert alert-danger">
                <?php
                echo $this->session->flashdata('error');
                ?>
            </div>

        <?php
        endif;

        ?>
        <?php
        if ($this->session->flashdata('success')) :
        ?>
            <div class="col-md-12 alert alert-success">
                <?php
                echo $this->session->flashdata('success');
                ?>
            </div>

        <?php
        endif;

        ?>
        <h1>Crud Application</h1>
        <h1><a class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#add"><i class="fa fa-plus"></i></a></h1>


        <!-- Modal -->
        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url(); ?>crud/store_product" method="post">
                            <div class="form-group mt-4">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group mt-4">
                                <label for="">Quantity</label>

                                <input type="number" class="form-control" name="quantity">
                            </div>
                            <div class="form-group mt-4">
                                <label for="">Status</label>

                                <select name="status" id="" class="form-control">
                                    <option value="">Choose One</option>
                                    <option value="0">Active</option>
                                    <option value="1">Dectiveted</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-dark mt-4"> Save Information</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">quantity</th>
                    <th scope="col">status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($data as $dat) :

                ?>
                    <tr>
                        <th scope="row"><?php echo $i++ ?></th>
                        <td><?php echo $dat->name ?></td>
                        <td><?php echo $dat->quantity ?></td>
                        <td><?php echo $dat->status ?></td>
                        <td>
                            <a class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#edit<?php echo $dat->id ?>"><i class="fa fa-edit"></i></a>
                            <div class="modal fade" id="edit<?php echo $dat->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url() ?>crud/update_product/<?php echo $dat->id ?>" method="post">
                                                <div class="form-group mt-4">
                                                    <label for="">Name</label>
                                                    <input type="text" class="form-control" name="name" value="<?php echo $dat->name ?>">
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label for="">Quantity</label>

                                                    <input type="number" class="form-control" name="quantity" value="<?php echo $dat->quantity ?>">
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label for="">Status</label>

                                                    <select name="status" id="" class="form-control">
                                                        <option value="">Choose One</option>
                                                        <option value="0" <?php if ($dat->status == "0") echo "selected";
                                                                            else echo ""; ?>>Active</option>
                                                        <option value="1" <?php if ($dat->status == "1") echo "selected";
                                                                            else echo ""; ?>>Dectiveted</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-dark mt-4"> Update Information</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <form action="<?php echo base_url()?>/crud/delete/<?php echo $dat->id ?>" method="post">
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php
                endforeach;
                $i = $i + 1;
                ?>
            </tbody>
        </table>
    </div>

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>

</html>