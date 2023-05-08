<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* Define the keyframes for the animation */
    @keyframes move {
      0% {
        transform: translateY(0);
      }

      60% {
        transform: translateY(14px);
      }

      90% {
        transform: translateY(0);
      }
    }

    /* Apply the animation to the number */
    .animate {
      color: red;
      animation-name: move;
      animation-duration: 2s;
      animation-iteration-count: infinite;
    }

    /* Apply the animation to the number within the container */
    .container .animate {
      display: inline-block;
    }

    .container {
      width: 50%;
      margin-top: 50px;
      text-align: center;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0069d9;
      border-color: #0062cc;
    }
  </style>
</head>

<body>
  <div class="container">
    <p>You need to pay <span class="animate">1,000,000</span> VND before registering on our website.</p>
    <p>Please enter the amount below to proceed with the payment.</p>

        <div class="modal-body">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="amount" >
            </div>
          </div>
          <form action="addmoney.php" method="post">
          <div class="modal-footer">
            <button type="submit"  class="btn btn-success" data-dismiss="modal" name="btn">Send</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel </button>
          </div>
          </form>
  </div>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</body>

</html>