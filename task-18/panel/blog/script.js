const area = document.querySelector("textarea");

document.getElementById("quote").addEventListener("click", (e) => {
    e.preventDefault();
    area.value += "\n<quote>\nQuote text comes on this line.\n<author>\nAuthor name comes on this line.\n</author>\n</quote>\n";
})

document.getElementById("header").addEventListener("click", (e) => {
    e.preventDefault();
    area.value += "\n<header>\nHeader text comes on this line.\n</header>\n";
})

document.getElementById("list").addEventListener("click", (e) => {
    e.preventDefault();
    area.value += "\n<list>\nElement 1\nElement 2\nElement 3 etc\n</list>\n";
})

document.getElementById("img").addEventListener("click", (e) => {
    e.preventDefault();
    area.value += "\n<img>\nImage name with extension comes here.\n</img>\n";
})