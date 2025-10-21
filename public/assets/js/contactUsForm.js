 document.getElementById("contactUsForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Collect form data
    const formData = new FormData(this);

    // Send form data using fetch
    fetch("assets/php/saveContactUsForm.php", {
    method: "POST",
    body: formData
})
    .then(response => response.text())
    .then(data => {
    // Display success message
    document.getElementById("formMessage").textContent = "Form Submitted Successfully!";
    document.getElementById("formMessage").style.color = "green";

    // Optionally reset the form
    document.getElementById("contactUsForm").reset();
})
    .catch(error => {
    // Display error message
    document.getElementById("formMessage").textContent = "There was an error submitting the form. Please try again.";
    document.getElementById("formMessage").style.color = "red";
});
});
