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
 


 
<script src="https://js.stripe.com/v3/"></script>



<div id='stripeLine'>Secure Payment with Stripe </div>  

<div id='backgroundDiv'>

 <div id='paymentForm'>


 <form action='<?php echo rootUrl ?>paymentApi' method="post" id="payment-form">
   <div class="form-row" id='InsideFormDiv'>

     <div id='nameDiv' >
       <label>Vos informations</label>
       <input type="email" name="mail" placeholder='mail de réception des photographies achetées(important)'>
       <input type="hidden" name="name" placeholder='nom/prénom' value="<?php echo $_SESSION["username"] ?>">
       <input type="hidden" name="amount" value=<?php echo $amount ?>>
       <input type="hidden" name="projectId" value=<?php echo $projectId ?>>
    </div>

   <div id='creditCardDiv' >

      <label for="card-element">
         Votre carte de crédit
      </label>

      <div id="card-element" class='container' style='width: 100%; border: solid none'>
        <!-- A Stripe Element will be inserted here. -->
      </div>

      <!-- Used to display form errors. -->
      <div id="card-errors" role="alert"></div>

      <button class='btn btn-info' style='width:100%'>Submit Payment</button>

   </div>

 </div>
 </form>

 </div>
</div>


<script>

   // Create a Stripe client.
var stripe = Stripe('pk_test_51IxbD8AxhkbQXqSAnU6vIQ02kkCYenH54KiCQAG4ZT3FtDorhXXUwymeSKhED8TDX7mDbHoTuMl3eE9r1Aa4moW400YNDZZRjY');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
 base: {
   color: '#32325d',
   fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
   fontSmoothing: 'antialiased',
   fontSize: '16px',
   '::placeholder': {
     color: '#aab7c4'
   }
 },
 invalid: {
   color: '#fa755a',
   iconColor: '#fa755a'
 }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
 var displayError = document.getElementById('card-errors');
 if (event.error) {
   displayError.textContent = event.error.message;
 } else {
   displayError.textContent = '';
 }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
 event.preventDefault();

 stripe.createToken(card).then(function(result) {
   if (result.error) {
     // Inform the user if there was an error.
     var errorElement = document.getElementById('card-errors');
     errorElement.textContent = result.error.message;
   } else {
     // Send the token to your server.
     stripeTokenHandler(result.token);
   }
 });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
 // Insert the token ID into the form so it gets submitted to the server
 var form = document.getElementById('payment-form');
 var hiddenInput = document.createElement('input');
 hiddenInput.setAttribute('type', 'hidden');
 hiddenInput.setAttribute('name', 'stripeToken');
 hiddenInput.setAttribute('value', token.id);
 form.appendChild(hiddenInput);

 // Submit the form
 form.submit();
}
</script>

