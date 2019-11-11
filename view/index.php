
<?php
include_once 'layout/header.php';
?>

<div class="main-content mt-5 container">



    <p class="p-2 "> Product Selling History

    <button type="button" class="btn btn-primary" style="float: right"  data-toggle="modal" data-target="#myModal"> Create Data </button>
    </p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>John</td>
            <td>Doe</td>
            <td>john@example.com</td>
        </tr>
        <tr>
            <td>Mary</td>
            <td>Moe</td>
            <td>mary@example.com</td>
        </tr>
        <tr>
            <td>July</td>
            <td>Dooley</td>
            <td>july@example.com</td>
        </tr>
        </tbody>
    </table>

    <form action="" id="DataEntryForm">
    <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" style="min-width: 800px">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Data Entry</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body row">


                        <div class="form-group col-sm-6">
                            <label for="email">Amount :</label>
                            <input type="text" data-validate="number" class="form-control" name="amount">
                            <div class="invalid-feedback">
                                Must be Only Number
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="email">Buyer  :</label>
                            <input type="text" class="form-control" data-validate="noSpecialChar" required name="buyer">
                            <div class="invalid-feedback">
                                Must be All Character without Special Character
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="email"> Receipt ID  :</label>
                            <input type="text" class="form-control" data-validate="letter" required  name="receipt_id">
                            <div class="invalid-feedback">
                                Must be text / Letter
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="email">Items  :</label>
                            <input type="text" class="form-control" name="items" required>
                        </div>


                        <div class="form-group col-sm-6">
                            <label for="email">Buyer Email  :</label>
                            <input type="text" class="form-control" data-validate="email" required name="buyer_email">
                            <div class="invalid-feedback">
                               Please input a valid email address
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="email">Note  :</label>
                            <textarea class="form-control" data-validate="wordLimit:2,30"  name="note"></textarea>
                            <div class="invalid-feedback">
                               Must input minimum 2 word and max 30 word
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="email">City :</label>
                            <input type="text" class="form-control" name="city">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="email">Phone :</label>
                            <input type="text" class="form-control" name="phone">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="email">Entry By  :</label>
                            <input type="text" class="form-control" name="entry_by">
                        </div>



                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ml-auto">Submit</button>
                </div>

            </div>
        </div>
    </div>
    </form>

    <script src="assets/fieldValidator.js"></script>

</div>
<?php
include_once 'layout/footer.php';
?>