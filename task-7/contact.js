const contactForm = document.forms.namedItem("contact-form");
const formInputs = contactForm.querySelectorAll("input, textarea, select");

const validateField = (element) => {
    switch (element.type) {
        case "email":
            return /^.{1,}@.{1,}\..{1,}$/.test(element.value);
        case "tel":
            return /\d/.test(element.value);
        case "select-one":
            return element.value !== "";
        default:
            return /./.test(element.value);
    }
}

const validateFields = (e) => {
    e.preventDefault();
    document.getElementById("contact-form-failed").classList.add("hidden");
    document.getElementById("contact-form-successful").classList.add("hidden");
    const inputsList = Array.from(formInputs);
    inputsList.forEach(el => el.classList.remove("invalid"))
    const invalidInputs = inputsList.filter(el => !validateField(el));
    if(invalidInputs.length > 0){
        invalidInputs.forEach(el => el.classList.add("invalid"));
        document.getElementById("contact-form-failed").classList.remove("hidden");
    }
    else{
        document.getElementById("contact-form-successful").classList.remove("hidden");
        Swal.fire(
            'Success!',
            'Form has been submitted successfully!',
            'success'
          )
    }
}

contactForm.addEventListener('submit', validateFields);