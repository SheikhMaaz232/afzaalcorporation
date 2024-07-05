
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contract Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 20px;
        }
        .print-btn {
            margin-bottom: 20px;
        }
        @media print {
            .print-btn {
                display: none;
            }
        }
        .contract-info {
            margin-bottom: 20px;
            {{--  border: 1px solid #dee2e6;  --}}
            padding: 10px;
        }
        .contract-info dt, .contract-info dd {
            border: 1px solid #dee2e6;
            padding: 8px;
        }
        .contract-info dt {
            font-weight: bold;
            background-color: #f8f9fa;
        }
        .contract-info dd {
            margin-left: 0;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
<br/>
<br/>


        <h2 style="text-align: center">Contract Detail</h2>

            <div class="contract-info">
                <dl class="row">
                    <dt class="col-sm-3">Contract Date</dt>
                    <dd class="col-sm-9">{{ \Carbon\Carbon::parse($contract->contract_date)->format('d-m-Y '); }}</dd>

                    <dt class="col-sm-3">Contract Number</dt>
                    <dd class="col-sm-9">{{ $contract->id }}</dd>

                    <dt class="col-sm-3">Buyer Name</dt>
                    <dd class="col-sm-9">{{ $contract->buyer->name }}</dd>

                    <dt class="col-sm-3">Seller Name</dt>
                    <dd class="col-sm-9">{{ $contract->seller->name }}</dd>

                    <dt class="col-sm-3">Quantity</dt>
                    <dd class="col-sm-9">{{ $contract->quantity . ' - ' . 'Bales' }}</dd>

                    <dt class="col-sm-3">Rate</dt>
                    <dd class="col-sm-9">{{ $contract->rate . ' / ' . 'Per maund' }}</dd>

                   <!-- <dt class="col-sm-3">Moisture</dt>
                    <dd class="col-sm-9">{{ $contract->moisture.'%' . ' - ' . $contract->moisture_type }}</dd>

                    <dt class="col-sm-3">Trash</dt>
                    <dd class="col-sm-9">{{ $contract->trash.'%' . ' - ' . $contract->trash_type }}</dd>-->

          <!--          <dt class="col-sm-3">Delivery</dt>
                    <dd class="col-sm-9">{{ $contract->delivery }}</dd>

                    <dt class="col-sm-3">Payment Method</dt>
                    <dd class="col-sm-9">{{ $contract->payment->name }}</dd>

                    <dt class="col-sm-3">Remarks</dt>
                    <dd class="col-sm-9" style="word-break: break-word">{{ $contract->remarks }}</dd>-->

                </dl>
            </div>
    </div>

</body>
</html>
