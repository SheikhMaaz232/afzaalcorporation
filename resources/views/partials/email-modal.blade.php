<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylish Modal</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .modal-header {
            background-color: #5b6be8;
            color: white;
        }
        .modal-footer {
            background-color: #f9f9f9;
        }
        .modal-content {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,.5);
        }
        .close {
            color: white;
            opacity: 1;
        }
        .btn-custom {
            background-color: #5cb85c;
            color: white;
        }
        .btn-custom:hover {
            background-color: #4cae4c;
            color: white;
        }
        .modal-title{
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Send Contract Email</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <h6 class="light-dark w-100">To<span style="color: red">*</span>
                            </h6>
                            <div class=" input-group" id="recepient">
                                <input type="text" name="to" class="form-control"
                                       value=""
                                       placeholder="Enter the recepient name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <h6 class="light-dark w-100">Description<span style="color: red">*</span>
                            </h6>
                            <div class="input-daterange input-group" id="contract-date">
                                <textarea name="description" class="form-control"
                                       value=""
                                          placeholder="Enter description"> </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group button-items mb-0 text-right modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            Send
                        </button>
                          <a class="btn btn-outline-danger waves-effect waves-light" data-dismiss="modal">Close</a>
                    </div>
                    <!-- Modal Footer -->
                   <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-custom" data-dismiss="modal">Close</button>
                    </div>-->
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
