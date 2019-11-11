
<?php
include_once 'layout/header.php';
?>

<div class="main-content mt-5 container">

<style>
    td{
        word-wrap: break-word
    }
    table{
        table-layout: fixed;
    }

    .item{
           position: relative;
       }
   .item>span{
       position: absolute;
       display: inline-block;
       width: 20px;
       height: 20px;
       background: red;
       text-align: center;
       font-size: 30px;
       line-height: 14px;
       color: white;
       right: 16px;
       top: 8px;
       cursor: pointer;
    }

</style>

    <p class="p-2 "> Product Selling History

    <button type="button" class="btn btn-primary" style="float: right"  data-toggle="modal" data-target="#dataEntryModal"> Create Data </button>
    </p>
    <div class="row">


    <table class="table table-striped  table-bordered col-sm-12">
        <thead>
        <tr>
            <th>Amount</th>
            <th>Buyer</th>
            <th>Receipt_id</th>
            <th>items</th>
            <th>buyer_email</th>
            <th>buyer_ip</th>
            <th>note</th>
            <th>city</th>
            <th>phone</th>
            <th>hash_key</th>
            <th>entry_at</th>
            <th>entry_by</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($purchaseData as $data){
         ?>
        <tr>
            <td><?php echo $data['amount'] ; ?> </td>
            <td><?php echo $data['buyer'] ; ?> </td>
            <td><?php echo $data['receipt_id'] ; ?> </td>
            <td><?php echo $data['items'] ; ?> </td>
            <td><?php echo $data['buyer_email'] ; ?> </td>
            <td><?php echo $data['buyer_ip'] ; ?> </td>
            <td><?php echo $data['note'] ; ?> </td>
            <td><?php echo $data['city'] ; ?> </td>
            <td><?php echo $data['phone'] ; ?> </td>
            <td><?php echo $data['hash_key'] ; ?> </td>
            <td><?php echo $data['entry_at'] ; ?> </td>
            <td><?php echo $data['entry_by'] ; ?> </td>
        </tr>
       <?php  } ?>
        </tbody>
    </table>
    </div>
    <form action="" id="DataEntryForm">
    <div class="modal fade" id="dataEntryModal" data-backdrop="static" data-keyboard="false">
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
                            <input type="text" class="form-control" data-validate="noSpecialChar|limit:20,50" required name="buyer">
                            <div class="invalid-feedback">
                                Must be All Character without Special Character & minimum length 20
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
                            <label for="email">Buyer Email  :</label>
                            <input type="text" class="form-control" data-validate="email" required name="buyer_email">
                            <div class="invalid-feedback">
                               Please input a valid email address
                            </div>
                        </div>
                            <h3 class="col-12">  Items <button type="button" onclick="addItem()" class="btn btn-primary ml-auto"> Add </button></h3>
                            <div class="col-sm-12 row " id="item-append-area">

                                <div class="form-group col-sm-6">
                                    <label for="email">Item  :</label>
                                    <input type="text" class="form-control" name="items[]" data-validate="letter" required>
                                    <div class="invalid-feedback">
                                      must text (Alphabet)
                                    </div>
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
                            <input type="text" class="form-control" data-validate="letter" name="city">
                            <div class="invalid-feedback">
                                Only Letter
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="email">Phone :</label>
                            <input type="text" class="form-control"  data-validate="mobile"  name="phone">
                            <div class="invalid-feedback">
                                Must be Only mobile Number, start with 0
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="email">Entry By  :</label>
                            <input type="text" class="form-control"  data-validate="number" name="entry_by">
                            <div class="invalid-feedback">
                                Must be Only mobile Number
                            </div>
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