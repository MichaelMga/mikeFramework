<h1>Stripe</h1>

<h5>Secure payment page</h5>

<h5>Amount to pay : </h5>

 <?php
   echo $amount;   
 ?>


    <section>
      <div class="product">
   
      <button type="button" id="checkout-button">Checkout</button>
    </section>

  </body>
  <script type="text/javascript">
    // Create an instance of the Stripe object with your publishable API key
    var stripe = Stripe("pk_test_51IxbD8AxhkbQXqSAnU6vIQ02kkCYenH54KiCQAG4ZT3FtDorhXXUwymeSKhED8TDX7mDbHoTuMl3eE9r1Aa4moW400YNDZZRjY");
    var checkoutButton = document.getElementById("checkout-button");

    checkoutButton.addEventListener("click", function () {
      fetch("<?php rootUrl ?>stripeCheckout", {
        method: "POST",
      })
        .then(function (response) {
          return response.json();
        })
        .then(function (session) {
          return stripe.redirectToCheckout({ sessionId: session.id });
        })
        .then(function (result) {
          // If redirectToCheckout fails due to a browser or network
          // error, you should display the localized error message to your
          // customer using error.message.

          if (result.error) {
            alert(result.error.message);
          }
        })
        .catch(function (error) {
          console.error("Error:", error);
        });
    });




  </script>