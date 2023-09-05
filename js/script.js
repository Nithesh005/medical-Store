navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   profile.classList.remove('active');
}

function loader(){
   document.querySelector('.loader').style.display = 'none';
}

function fadeOut(){
   setInterval(loader, 2000);
}

window.onload = fadeOut;

document.querySelectorAll('input[type="number"]').forEach(numberInput => {
   numberInput.oninput = () =>{
      if(numberInput.value.length > numberInput.maxLength) numberInput.value = numberInput.value.slice(0, numberInput.maxLength);
   };
});

$(document).ready(function(){
   $('.razorpay-payment-button').click()

});
window.addEventListener("load", function() {
   const paymentMethodSelect = document.querySelector("select[name='method']");
   const razorpayButton = document.querySelector(".razorpay-payment-button"); // Select by class name

   // Function to click the Razorpay button
   function clickRazorpayButton() {
      if (razorpayButton) {
         razorpayButton.click(); // Trigger a click event
      }
   }

   // Automatically click the Razorpay button after a short delay (adjust as needed)
   setTimeout(clickRazorpayButton, 1000); // 1000 milliseconds (1 second) delay

   paymentMethodSelect.addEventListener("change", function() {
      if (this.value === "Pay online") {
         clickRazorpayButton(); // Click the button when "Pay online" is selected
      }
   });
});