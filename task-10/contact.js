const contactForm = document.forms.namedItem("contact-form");
const formInputs = contactForm.querySelectorAll("input, textarea, select");

const unsafeWords = ["idiot", "dumb", "shit", "stupid", "silly", "fuck", "fool"]

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

const checkSafeText = (element) => {
    switch (element.type){
        case "select-one":
            return true;
        default:
            return !(new RegExp(`(${unsafeWords.join("|")})`)).test(element.value);
    }
}

const validateFields = (e) => {
    e.preventDefault();
    document.getElementById("contact-form-failed").classList.add("hidden");
    document.getElementById("contact-form-successful").classList.add("hidden");
    const inputsList = Array.from(formInputs);
    inputsList.forEach(el => el.classList.remove("invalid"))

    const unsafeInputs = inputsList.filter(el => !checkSafeText(el));

    if(unsafeInputs.length > 0){
        unsafeInputs.forEach(el => el.classList.add("invalid"));
        Swal.fire({
            icon: 'error',
            title: 'Unsafe Word(s) Detected!',
            text: 'Check the red fields!'
          })
        return;
    }

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