// JavaScript to handle payment method selection and display the relevant section
document.getElementById('payment-method').addEventListener('change', function () {
    var selectedMethod = this.value;
    
    // Hide all payment method sections
    document.querySelectorAll('.payment-method-section').forEach(function (section) {
        section.style.display = 'none';
    });

    // Show the selected payment method section
    if (selectedMethod === 'manual') {
        document.getElementById('manual-payment').style.display = 'block';
    } else if (selectedMethod === 'bkash') {
        document.getElementById('bkash-payment').style.display = 'block';
    } else if (selectedMethod === 'rocket') {
        document.getElementById('rocket-payment').style.display = 'block';
    } else if (selectedMethod === 'nagad') {
        document.getElementById('nagad-payment').style.display = 'block';
    }
});

// Form submission handler
document.getElementById('payment-form').addEventListener('submit', function (e) {
    e.preventDefault();
    
    var paymentMethod = document.getElementById('payment-method').value;
    if (!paymentMethod) {
        alert('Please select a payment method.');
        return;
    }
    
    alert('Payment submitted successfully!');
    // Here you would handle the form submission logic (e.g., sending data to the server)
});


document.getElementById('payment-form').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the form from submitting (for demo purposes)

    // Show the payment success modal
    document.getElementById('payment-success-modal').style.display = 'block';
});

// Close the modal when the close button is clicked
document.getElementById('close-modal').addEventListener('click', function () {
    // Hide the modal
    document.getElementById('payment-success-modal').style.display = 'none';

    // Optionally, redirect to the profile page or another page
    window.location.href = 'profile.html'; // Adjust the URL as needed
});




