const displayDropdown = (target) => {
    Array.from(target.getElementsByClassName("dropdown-container")).forEach(el => {
        el.classList.remove("hidden");
    })
    if(target.querySelector("span")){
        target.querySelector("span").innerHTML = "-";
    }
}

const hideDropdown = (target) => {
    Array.from(target.getElementsByClassName("dropdown-container")).forEach(el => {
        el.classList.add("hidden");
    })
    if(target.querySelector("span")){
        target.querySelector("span").innerHTML = "+";
    }
}

const displayDropright = (target) => {
    Array.from(target.getElementsByClassName("dropright-container")).forEach(el => {
        el.classList.remove("hidden");
    })
}

const hideDropright = (target) => {
    Array.from(target.getElementsByClassName("dropright-container")).forEach(el => {
        el.classList.add("hidden");
    })
}

Array.from(document.getElementsByClassName("navbar-item")).forEach(el => {
    el.addEventListener("mouseover", () => displayDropdown(el));
    el.addEventListener("mouseleave", () => hideDropdown(el))
});

Array.from(document.getElementsByClassName("dd-item")).forEach(el => {
    el.addEventListener("mouseover", () => displayDropright(el));
    el.addEventListener("mouseleave", () => hideDropright(el))
});