export function changeLoc(href, redirect = true) {
    let a = document.createElement("a");
    a.href = href;
    if (redirect) {
        a.target = "_blank";
        a.rel = "noopener noreferrer";
    }
    a.click();
}

export function mailTo(mail) {
    let email = document.createElement("a");
    email.href = mail;
    email.click();
}

export function copyText(text) {
    navigator.clipboard.writeText(text).then(r => alert(`"${text}" copied successfully !`));
    return true;
}

export function reload(){
    location.reload();
}