<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Request Submitted</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='custom.css' rel='stylesheet' type='text/css'>
    <style>
        button {
            background-color: #0d45a5;
            /* Green */
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button2 {
            padding: 12px 28px;
        }
        body{
        background: linear-gradient(to  right, #D3F5CF 0%, #A8DBFA 0%,#635EE2 100%);
    }

        .glass{
        /* From https://css.glass */
            background: rgba(255, 255, 255, 0.22);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(6.7px);
            -webkit-backdrop-filter: blur(6.7px);
            border: 1px solid rgba(255, 255, 255, 0.37);
    }
    </style>
</head>

<body>
    <div class="container">

        <!--Section: Contact v.2-->
        <section class="section">
            <div class="col-xl-12">
                <!--Section heading-->

                <div class="col-xl-6 offset-xl-1 py-5">
                    <!--Section heading-->

                    <!-- <h4 align="center">Equipment Request Form </h4>-->
                </div>

                    <section class="content card-default">
                        <div class="container-fluid">
                            <div class="card glass">
                                <div class="card-header">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <center>
                                                        <h4>
                                                            <font color="green">Your Purchase request sucessfully submitted.</font>
                                                        </h4>
                                                        Division will forward you the <b>#{{ $getRequestID->reqno }}</b> in the acknowledge email.
                                                        <br><br>
                                                        <a href="/" class="btn btn-success">New Request</a>
                                                </div>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                    </section>


            </div>
        </section>
    </div>
</body>
</html>
